<?php
namespace Forum\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Forum\Service\PageServiceInterface;
use Forum\Service\PageService;
use Zend\View\Model\ViewModel;
use Forum\Form\PageForm;
use Application\Common\WAuthUtil;
use Forum\Model\Page;
use Zend\Debug\Debug;
use Zend\Filter\BaseName;
use Zend\Filter\File\Rename;
use Application\Common\WBasePath;
use Zend\Http\Request;
use Zend\Feed\Reader\Reader;
use Forum\Model\User;
use Application\Common\PageGen;

class PageController  extends AbstractActionController
{
    protected $pageService;
    
    public function __construct(PageService $pageService)
    {

        $this->pageService = $pageService;
    }
    
    public function testajaxAction(){
        $request = $this->getRequest();
        Debug::dump($request);
    }
    public function indexAction()
    {        
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        $secID=0;
        $ptype=0;
        if($request->isGet()&&isset($request->getQuery()['secID'])){
            $secID=$request->getQuery('secID');
            $ptype=$request->getQuery('ptype'); 
        }
        WAuthUtil::addUserpanelToLayout($this, '/page');
        
        if($request->isGet()&&isset($request->getQuery()['page'])){
            $page_=$request->getQuery('page');
        }
        else $page_=1;
        $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
        $url=preg_replace('/index.php/', 'page', $url);
        $rownum=$this->pageService->getPageCount($secID,$ptype);
        $rowper=10;
        $pgen=new PageGen($rownum, $rowper, $page_, $url,5);
        $limit=$pgen->genPdo()['limit'];
        $offset=$pgen->genPdo()['offset'];
        $bararr=$pgen->genBar();
        
        return new ViewModel(array(
            'whetherLogIn'=>(WAuthUtil::get_auth()===null?false:true),
            'pages' => $this->pageService->getPages($secID,$ptype,$limit,$offset),
            'secID' => $secID,
            'ptype' =>$ptype,
            'recs'=>$this->pageService->getRecs(),
            'bararr'=>$bararr
        ));
    }
    public function getservice(){
        return $this->pageService;
    }
    
    public function searchAction(){
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        if($request->isGet()&&isset($request->getQuery()['q'])){
            $q=urlencode($request->getQuery('q'));
            $result = file_get_contents("http://localhost:8983/solr/gettingstarted_shard1_replica2/select?q=$q&wt=json&indent=true");
            $de=json_decode($result);
            $de=$de->response;
            $n=$de->numFound;
            $return=array();
            for($i=0;$i<$n;$i++){
                $idori=$de->docs[$i]->id;
                $pos=strpos($idori,'pos');
                $pos+=5;
                $id=substr($idori, $pos,4);
                $p=$this->getservice()->getPage($id);
                $return[]=$p->current();
            }
//             Debug::dump($de->docs[0]);
//             print_r($de);
        }
        
        WAuthUtil::addUserpanelToLayout($this, '/search');
        return new ViewModel(array(
            'pages'=>$return
        ));
        
    }
    public function addAction()
    {
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        $form=new PageForm();
        //start
        if($request->isPost()&&isset($request->getPost()['pcontent'])){
           $page = new Page();
           $user=new User();
            $form->bind($page);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $auth=WAuthUtil::get_auth();
                $schID=$auth->schoolID;
                $userID=$auth->userID;
                $page->setSchID($schID);
                $user->setUserID($userID);
                $page->setUser($user);
                $pageID=$this->getservice()->getNewPageIDandMakedir();
                $page->setPageID($pageID);
                $file=$request->getFiles();
                $this->getservice()->savePage($page,$file);
//                 Redirect to list of albums如果想要dump就不要转业
                return $this->redirect()->toRoute('page');
            }
            else {
                $messages = $form->getMessages();
                Debug::dump($messages);
            }
        }

        WAuthUtil::addUserpanelToLayout($this, '/add');
        return new ViewModel(array(
            'pageform'=>$form
        ));
    }

    /*
     * 针对ckeditor的图片ajax上传处理
     */
    public function addUpPicSerAction(){
        $path_for_route="/data/postinlineimg/";//由于在apache配置文件里设置到了public,注意前面的/一定要加，表示绝对路径
        $path_for_frame=WBasePath::getBasePath()."/".$path_for_route;//实际存的时候存放的地址。

//         if (file_exists($path. $_FILES["upload"]["name"]))
//         {
//              echo $_FILES["upload"]["name"] . " already exists please choose another image.";
//         }
//             $ran_path_for_route=$this->getservice()->getRandomizedname();
//         $suffixfilter=new BaseName();
//         $suffixname=$suffixfilter->filter($_FILES['upload']['name']);//upload name
        $filter=new Rename(array(
            "target"=>$path_for_frame. $_FILES["upload"]["name"],
            "randomize"=>true,
        ));
        $filepath=$filter->filter($_FILES['upload']['tmp_name']);
        $suffixfilter=new BaseName();
        $suffixname=$suffixfilter->filter($filepath);
//              move_uploaded_file($_FILES["upload"]["tmp_name"],
//              $path_for_frame . $_FILES["upload"]["name"]);
//              echo "Stored in: " . $path_for_frame . $_FILES["upload"]["name"];
             // Required: anonymous function reference number as explained above.
             $funcNum = $_GET['CKEditorFuncNum'] ;
             // Optional: instance name (might be used to load a specific configuration file or anything else).
             $CKEditor = $_GET['CKEditor'] ;
             // Optional: might be used to provide localized messages.
             $langCode = $_GET['langCode'] ;
             
             // Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
             $url = $path_for_route . $suffixname;
             // Usually you will only assign something here if the file could not be uploaded.
             $message = '';
             echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        
        $viewfordisable=new ViewModel();
        $viewfordisable->setTerminal(true); //disable layout
        return $viewfordisable;
    }
}
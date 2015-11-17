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

class PageController  extends AbstractActionController
{
    protected $pageService;
    
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
    
    public function indexAction()
    {
        return new ViewModel(array(
            'pages' => $this->pageService->getPages()
        ));
    }
    public function detailAction(){
        
    }
    public function getservice(){
        return $this->pageService;
    }
    public function addAction()
    {
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        $form=new PageForm();
        //start
        if($request->isPost()&&isset($request->getPost()['pcontent'])){
           $page = new Page();
//            $form->get('editor1')->setName('pcontent');
//            $data=$request->getPost();
//            $data['pcontent']=$data['editor1'];
           
//             echo $_GET['user'];
//             Debug::dump($request->getPost());
//             $form->setInputFilter($page->getInputFilter());//就算没有输入id也可以通过检验。
            $form->bind($page);
            $form->setData($request->getPost());
            if ($form->isValid()) {
//                 $user->setId(9);
//                 print_r($page);
                $auth=WAuthUtil::get_auth();
                $schID=$auth->schoolID;
                $userID=$auth->userID;
                $page->setSchID($schID);
                $page->setUserID($userID);
                $page->setPageID(10001);
//                 print_r($page);
                $this->getservice()->savePage($page);
//                  Debug::dump($page);
//                 $this->getservice()->save($page);
//                 $this->getservice()->auth($page);
//                 Debug::dump($form->getData());//经过bind,是一个$user对象，必须要实现exchangeArray ，get和set不必要
                //Debug::dump($user);//同上
//                 Redirect to list of albums如果想要dump就不要转业
//                 return $this->redirect()->toRoute('add');
            }
            else {
                $messages = $form->getMessages();
                Debug::dump($messages);
            }
        }
        //end
        //处理上传文字信息

        WAuthUtil::addUserpanelToLayout($this, '/add');
        return new ViewModel(array(
            'pageform'=>$form
        ));
    }

    /*
     * 针对ckeditor的图片ajax上传处理
     */
    public function addUpPicSerAction(){
        $path_for_route="data/user/postimg/";//由于在apache配置文件里设置到了public
        $path_for_frame="public/".$path_for_route;//实际存的时候存放的地址。

//         if (file_exists($path. $_FILES["upload"]["name"]))
//         {
//              echo $_FILES["upload"]["name"] . " already exists please choose another image.";
//         }
             move_uploaded_file($_FILES["upload"]["tmp_name"],
             $path_for_frame . $_FILES["upload"]["name"]);
             echo "Stored in: " . $path_for_frame . $_FILES["upload"]["name"];
             // Required: anonymous function reference number as explained above.
             $funcNum = $_GET['CKEditorFuncNum'] ;
             // Optional: instance name (might be used to load a specific configuration file or anything else).
             $CKEditor = $_GET['CKEditor'] ;
             // Optional: might be used to provide localized messages.
             $langCode = $_GET['langCode'] ;
             
             // Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
             $url = $path_for_route . $_FILES["upload"]["name"];
             // Usually you will only assign something here if the file could not be uploaded.
             $message = '';
             echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
        
        $viewfordisable=new ViewModel();
        $viewfordisable->setTerminal(true); //disable layout
        return $viewfordisable;
    }
}
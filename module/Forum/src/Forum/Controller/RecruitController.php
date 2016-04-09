<?php
namespace Forum\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Common\WAuthUtil;
use Zend\Debug\Debug;
use Zend\Filter\BaseName;
use Zend\Filter\File\Rename;
use Application\Common\WBasePath;
use Zend\Http\Request;
use Zend\Feed\Reader\Reader;
use Forum\Model\User;
use Forum\Service\RecruitService;
use Forum\Form\RecruitForm;
use Forum\Model\Recruit;
class RecruitController extends AbstractActionController
{
protected $recruitService;
    
    public function __construct(RecruitService $recruitService)
    {

        $this->recruitService = $recruitService;
    }
    public function indexAction()
    {        
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        $tag=0;
        $type=1;//1是组队招募
        if($request->isGet()&&isset($request->getQuery()['tag'])){
            $tag=$request->getQuery()['tag'];
        }
        if(isset($request->getQuery()['type'])){
            $type=$request->getQuery()['type'];
        }
        if($type!=1&&$type!=2) $type=1;
        WAuthUtil::addUserpanelToLayout($this, '/recruit');
        return new ViewModel(array(
            'type'=>$type,
            'recruits' => $this->recruitService->getRecruits($tag,$type),
        ));
    }
    public function getservice(){
        return $this->recruitService;
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
                $p=$this->getservice()->getRecruit($id);
                $return[]=$p->current();
            }
//             Debug::dump($de->docs[0]);
//             print_r($de);
        }
        
        WAuthUtil::addUserpanelToLayout($this, '/search');
        return new ViewModel(array(
            'recruits'=>$return
        ));
        
    }
    public function addAction()
    {
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        $form=new RecruitForm();
        //start
        if($request->isPost()&&isset($request->getPost()['rcontent'])){
           $recruit = new Recruit();
           $user=new User();
            $form->bind($recruit);
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $auth=WAuthUtil::get_auth();
                $schID=$auth->schoolID;
                $userID=$auth->userID;
                $recruit->setSchID($schID);
                $user->setUserID($userID);
                $recruit->setUser($user);
                $recruitID=$this->getservice()->getNewRecruitIDandMakedir();
                $recruit->setRecruitID($recruitID);
//                 $file=$request->getFiles();
                $this->getservice()->saveRecruit($recruit);
//                 Redirect to list of albums如果想要dump就不要转业
                return $this->redirect()->toRoute('recruit');
            }
            else {
                $messages = $form->getMessages();
                Debug::dump($messages);
            }
        }

        WAuthUtil::addUserpanelToLayout($this, '/recruit');
        return new ViewModel(array(
            'recruitform'=>$form
        ));
    }
}

?>
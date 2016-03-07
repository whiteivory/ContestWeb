<?php
namespace Forum\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Forum\Service\FollowService;
use Forum\Service\PageService;
use Application\Common\WAuthUtil;
use Zend\View\Model\ViewModel;
use Forum\Form\FollowForm;
use Forum\Model\User;
use Forum\Model\Follow;
use Zend\Debug\Debug;
class FollowController extends AbstractActionController{
    protected $followService;
    protected $pageService;


 public function __construct(FollowService $followService,PageService $pageService)
    {
        $this->pageService=$pageService;
        $this->followService = $followService;
    }
    public function detailAction(){
        WAuthUtil::whetherLogout($this);
        //form
        $form=new FollowForm();
        
        $id = $this->params()->fromRoute('id');
        //增加点击次数
        $this->getFollowService()->updateClicktime($id);
        //查看是否评论，进行request处理
        $request = $this->getRequest();
        $auth=WAuthUtil::get_auth();
        $userID=$auth->userID;
        if($request->isPost()&&isset($request->getPost()['fcontent'])){
            $followObject = new Follow();
            $user=new User();  //！之所以要用一个对象，是因为follow对象里面没有userID这个属性，要在mapper里手工加上
            $form->bind($followObject);//通过Hydrator\ArraySerializable 通过model的exchangeArray
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $user->setUserID($userID);
                $followObject->setUser($user);
                $followObject->setPageID($id);
                $this->getFollowService()->saveFollow($followObject);
                //                 Redirect to list of albums如果想要dump就不要转业
                //                 return $this->redirect()->toRoute('page');
            }
            else {
                $messages = $form->getMessages();
                Debug::dump($messages);
            }
        }

        //读取page信息
        try {
            $page = $this->getPageService()->getPage($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('blog');
        }
        //读取follow信息
        $follows=$this->getFollowService()->getFollows($id);
        

        
        
//         //         Debug::dump($page);
        WAuthUtil::addUserpanelToLayout($this, '/detail/'.$id);
        return new ViewModel(array(
            'userID'=>$userID,
            'page' => $page,
            'follows'=>$follows,
            'form'=>$form
        ));
    }
    /**
     * @return the $followService
     */
    public function getFollowService()
    {
        return $this->followService;
    }

 /**
     * @return the $pageService
     */
    public function getPageService()
    {
        return $this->pageService;
    }
    public function zanajaxAction(){
        $request=$this->getRequest();
        $hasrecord=0;
        $msg='';
        if($request->isPost()&&isset($request->getPost()['userID'])){
            $userID=$request->getPost()['userID'];
            $pageID=$request->getPost()['pageID'];
            $sql="select * from zanup where userID=$userID and pageID=$pageID";
            
            try {
                $dbh=new \PDO('mysql:host=localhost;dbname=contestweb', 'root', '');
                $stmt=$dbh->query($sql);
                $curr=$stmt->fetch();
                if(isset($curr['userID'])){
                    $hasrecord=1;
                }
                else{
                    $sqlforupdate="update page set pzannum=pzannum+1 where pageID=$pageID";
                    $dbh->query($sqlforupdate);
                    $sqlforinsert="insert into zanup(userID,pageID) values($userID,$pageID)";
                    $dbh->query($sqlforinsert);
                }
                $dbh=null;
            } catch (\Exception $e) {
                $msg= "ERROR!: ".$e->getMessage()."<br/>";
            }
            $success=$hasrecord==1?0:1;
            if($success==0) $msg='每个人只能点赞一次哦！';
            
            echo '{"success":'.$success.',"msg":'.'"'.$msg.'"'.',"sql":'.'"'.$sql.'"'.'}';

        }
        //disable layout for the use of ajax;
        $viewfordisable=new ViewModel();
        $viewfordisable->setTerminal(true);
        return $viewfordisable; 
    }
}

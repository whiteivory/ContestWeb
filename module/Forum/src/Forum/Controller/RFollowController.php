<?php
namespace Forum\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Forum\Service\RFollowService;
use Forum\Service\RecruitService;
use Application\Common\WAuthUtil;
use Zend\View\Model\ViewModel;
use Forum\Form\RFollowForm;
use Forum\Model\User;
use Forum\Model\RFollow;
use Zend\Debug\Debug;
class RFollowController extends AbstractActionController{
    protected $followService;
    protected $recruitService;


 public function __construct(RFollowService $followService,recruitService $recruitService)
    {
        $this->recruitService=$recruitService;
        $this->followService = $followService;
    }
    public function detailAction(){
        WAuthUtil::whetherLogout($this);

        //form
        $form=new RFollowForm();
        
        $id = $this->params()->fromRoute('id');
        //查看是否评论，进行request处理
        $request = $this->getRequest();
        if($request->isPost()&&isset($request->getPost()['rfcontent'])){
            $followObject = new RFollow();
            $user=new User();  //！之所以要用一个对象，是因为follow对象里面没有userID这个属性，要在mapper里手工加上
            $form->bind($followObject);//通过Hydrator\ArraySerializable 通过model的exchangeArray
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $auth=WAuthUtil::get_auth();
                $userID=$auth->userID;
                $user->setUserID($userID);
                $followObject->setUser($user);
                $followObject->setRecruitID($id);
                $this->getRFollowService()->saveRFollow($followObject);
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
            $recruit = $this->getRecruitService()->getRecruit($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('blog');
        }
        //读取follow信息
        $follows=$this->getRFollowService()->getRFollows($id);
        

        
        
//         //         Debug::dump($page);
        WAuthUtil::addUserpanelToLayout($this, '/detail/'.$id);
        return new ViewModel(array(
            'recruit' => $recruit,
            'follows'=>$follows,
            'form'=>$form
        ));
    }
    /**
     * @return the $followService
     */
    public function getRFollowService()
    {
        return $this->followService;
    }

 /**
     * @return the $recruitService
     */
    public function getRecruitService()
    {
        return $this->recruitService;
    }
}

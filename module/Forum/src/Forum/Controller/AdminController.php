<?php
namespace Forum\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Forum\Service\PageService;
use Forum\Service\AdminService;
use Application\Common\WAuthUtil;
use Zend\View\Model\ViewModel;
class AdminController extends AbstractActionController{
    protected $adminService;
    public function __construct($adminService)
    {
         $this->adminService = $adminService;
    }
    public function indexAction(){
        WAuthUtil::whetherLogout($this);
        $request = $this->getRequest();
        if($request->isGet()&&(isset($request->getQuery()['userId']))&&$request->getQuery()['userId'] !=null){
            $userId = $request->getQuery()['userId'];
            $this->adminService->deleteUser($userId);
            echo "删除用户{$userId}成功！";
        }
        if($request->isGet()&&isset($request->getQuery()['pageId'])&&$request->getQuery()['pageId']!=null){
            $pageId =$request->getQuery()['pageId'];
            $this->adminService->deletePage($request->getQuery()['pageId']);
            echo "删除帖子{$pageId}成功";
        }
        WAuthUtil::addUserpanelToLayout($this, '/admin');
        $type = WAuthUtil::get_auth()==null?0:WAuthUtil::get_auth()->type;
        return new ViewModel(array(
           'type'=>$type 
        ));
    }
}
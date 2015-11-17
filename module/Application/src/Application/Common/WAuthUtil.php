<?php
/*进行是否注销操作的判断，放在每个页面action的最前面。
 * 调用如下
 * WAuthUtil::whetherLogout($this);
 * 
 * 在action return viewmodel之前调用addUserpanelToLayout
 */
namespace Application\Common;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Debug\Debug;
use Zend\View\Model\ViewModel;

class WAuthUtil{
    public static function whetherLogout(AbstractActionController $controllerClass){
        $request = $controllerClass->getRequest();
        if ($request->isGet()&&$request->getQuery()->offsetGet('logout')) {
            $auth = new AuthenticationService();
            $auth->getStorage()->clear();
        }
    }
    
    //第二个参数为对应url，比如/test或者/blog
    public static function addUserpanelToLayout(AbstractActionController $controllerClass
        ,$currentPageNameStr){
        
        $idenobj = self::get_auth();
//          Debug::dump($idenobj);
        //layout()用法
        $v1=new ViewModel();
        $tmpArray=array();
        if($idenobj)
             $tmpArray['identity']=$idenobj->username;
        $tmpArray['currentPage']=$currentPageNameStr;
        $v1=new ViewModel($tmpArray);
        //网页顶部显示登陆信息一般过程
//         $v1->setTemplate('blog/user/userPanel');//注意这样写可以指向blog module里的对应没有问题。
        $v1->setTemplate('layout/userPanel');
        $layout=$controllerClass->layout();
        $layout->addChild($v1,'userPanel');
    }
    /**
     * @return string 用户名字符串
     */
    public static function get_auth(){
        $auth = new AuthenticationService();
        $tmp=$auth->getStorage()->read();
        return $tmp;//返回一个类，有username和schoolID这两个在userservice里面get——auth函数里write数据库中的两列。
    }
}
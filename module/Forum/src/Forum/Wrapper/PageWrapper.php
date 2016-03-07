<?php
namespace Forum\Wrapper;
use Forum\Model\Page;
use Forum\Model\User;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
/*
 * 接收一个resultset数组
 * 返回一个page类，page含有一个user的成员变量。
 */
class PageWrapper implements PageWrapperInterface{
    protected $page;
    protected $user;
    protected $resultset;
    public function __construct(ResultSet $resultset){
        $this->resultset=$resultset;
    }
    
    /**
     * @return the $page
     */
    
    public function getPage()
    {
        return $this->page;
    }

 /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

 /**
     * @param field_type $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

 /**
     * @param field_type $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}

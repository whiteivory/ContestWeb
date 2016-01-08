<?php
namespace Forum\Model;
use Forum\Model\User;
class Follow{
    private $followID;
    private $pageID;
    /**
     * 
     * @var User
     */
    private $user; 
    private $fcontent;
    private $ftime;
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    public function exchangeArray($data)
    {
        $this->followID     = (isset($data['followID']))     ? $data['followID']     : null;
        $this->pageID = (isset($data['pageID'])) ? $data['pageID'] : null;
        $this->fcontent  = (isset($data['fcontent']))  ? $data['fcontent']  : null;
        //         $this->userID = (isset($data['userID']))     ? $data['userID']     : null;
        //         $this->username= (isset($data['username']))     ? $data['username']     : null;
        $this->ftime= (isset($data['ftime']))     ? $data['ftime']     : null;
    }
 /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

 /**
     * @param \Forum\Model\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

 /**
     * @return the $followID
     */
    public function getFollowID()
    {
        return $this->followID;
    }

 /**
     * @return the $pageID
     */
    public function getPageID()
    {
        return $this->pageID;
    }

 /**
     * @return the $fcontent
     */
    public function getFcontent()
    {
        return $this->fcontent;
    }

 /**
     * @return the $ftime
     */
    public function getFtime()
    {
        return $this->ftime;
    }

 /**
     * @param field_type $followID
     */
    public function setFollowID($followID)
    {
        $this->followID = $followID;
    }

 /**
     * @param field_type $pageID
     */
    public function setPageID($pageID)
    {
        $this->pageID = $pageID;
    }

 /**
     * @param field_type $fcontent
     */
    public function setFcontent($fcontent)
    {
        $this->fcontent = $fcontent;
    }

 /**
     * @param field_type $ftime
     */
    public function setFtime($ftime)
    {
        $this->ftime = $ftime;
    }

    
}
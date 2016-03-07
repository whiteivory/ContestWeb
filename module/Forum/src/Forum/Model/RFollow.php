<?php
namespace Forum\Model;
use Forum\Model\User;

class RFollow{
    private $rfollowID;
    private $recruitID;
    /**
     * 
     * @var User
     */
    private $user; 
    private $rfcontent;
    private $rftime;
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    public function exchangeArray($data)
    {
        $this->rfollowID     = (isset($data['rfollowID']))     ? $data['rfollowID']     : null;
        $this->recruitID = (isset($data['recruitID'])) ? $data['recruitID'] : null;
        $this->rfcontent  = (isset($data['rfcontent']))  ? $data['rfcontent']  : null;
        //         $this->userID = (isset($data['userID']))     ? $data['userID']     : null;
        //         $this->username= (isset($data['username']))     ? $data['username']     : null;
        $this->rftime= (isset($data['rftime']))     ? $data['rftime']     : null;
    }
 /**
     * @return the $rfollowID
     */
    public function getRfollowID()
    {
        return $this->rfollowID;
    }

 /**
     * @return the $recruitID
     */
    public function getRecruitID()
    {
        return $this->recruitID;
    }

 /**
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

 /**
     * @return the $rfcontent
     */
    public function getRfcontent()
    {
        return $this->rfcontent;
    }

 /**
     * @return the $rftime
     */
    public function getRftime()
    {
        return $this->rftime;
    }

 /**
     * @param Ambigous <NULL, unknown> $rfollowID
     */
    public function setRfollowID($rfollowID)
    {
        $this->rfollowID = $rfollowID;
    }

 /**
     * @param Ambigous <NULL, unknown> $recruitID
     */
    public function setRecruitID($recruitID)
    {
        $this->recruitID = $recruitID;
    }

 /**
     * @param \Forum\Model\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

 /**
     * @param Ambigous <NULL, unknown> $rfcontent
     */
    public function setRfcontent($rfcontent)
    {
        $this->rfcontent = $rfcontent;
    }

 /**
     * @param Ambigous <NULL, unknown> $rftime
     */
    public function setRftime($rftime)
    {
        $this->rftime = $rftime;
    }


    
}
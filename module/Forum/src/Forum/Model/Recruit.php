<?php
namespace Forum\Model;

class Recruit
{
    private $recruitID;
    private $user;
    public $userID;//为了进行insert操作时候，只需要一个ID就可以了。
    private $rtitle;
    private $rtime;
    private $rcontent;
    private $lasttime;
    private $rclicknum;
    private $rreplynum;
    private $schID;
    private $tag;
    private $type;

    public function exchangeArray($data)
    {
        $this->recruitID     = (isset($data['recruitID']))     ? $data['recruitID']     : null;
        $this->rtitle= (isset($data['rtitle']))     ? $data['rtitle']     : null;
        $this->rcontent= (isset($data['rcontent']))     ? $data['rcontent']     : null;
        $this->rtime= (isset($data['rtime']))     ? $data['rtime']     : null;
        $this->lasttime= (isset($data['lasttime']))     ? $data['lasttime']     : null;
        $this->rclicknum= (isset($data['rclicknum']))     ? $data['rclicknum']     : null;
        $this->rreplynum= (isset($data['rreplynum']))     ? $data['rreplynum']     : null;
        $this->schID= (isset($data['schID']))     ? $data['schID']     : null;
        $this->tag= (isset($data['tag']))     ? $data['tag']     : null;
        $this->type= (isset($data['type']))     ? $data['type']     : null;
        
    }
    /**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

 /**
     * @param field_type $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    
    /**
     * @return the $tag
     */
    public function getTag()
    {
        return $this->tag;
    }

 /**
     * @param field_type $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

 /**
     * @return the $schID
     */
    public function getSchID()
    {
        return $this->schID;
    }

 /**
     * @param field_type $schID
     */
    public function setSchID($schID)
    {
        $this->schID = $schID;
    }

 /**
     * @return the $recruitID
     */
    public function getRecruitID()
    {
        return $this->recruitID;
    }

 /**
     * @return the $userID
     */
    public function getUserID()
    {
        return $this->userID;
    }

 /**
     * @return the $rtitle
     */
    public function getRtitle()
    {
        return $this->rtitle;
    }

 /**
     * @return the $rtime
     */
    public function getRtime()
    {
        return $this->rtime;
    }

 /**
     * @return the $rcontent
     */
    public function getRcontent()
    {
        return $this->rcontent;
    }

 /**
     * @return the $lasttime
     */
    public function getLasttime()
    {
        return $this->lasttime;
    }

 /**
     * @return the $rclicknum
     */
    public function getRclicknum()
    {
        return $this->rclicknum;
    }

 /**
     * @return the $rreplynum
     */
    public function getRreplynum()
    {
        return $this->rreplynum;
    }

 /**
     * @param Ambigous <NULL, unknown> $recruitID
     */
    public function setRecruitID($recruitID)
    {
        $this->recruitID = $recruitID;
    }

 /**
     * @param field_type $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

 /**
     * @param Ambigous <NULL, unknown> $rtitle
     */
    public function setRtitle($rtitle)
    {
        $this->rtitle = $rtitle;
    }

 /**
     * @param Ambigous <NULL, unknown> $rtime
     */
    public function setRtime($rtime)
    {
        $this->rtime = $rtime;
    }

 /**
     * @param Ambigous <NULL, unknown> $rcontent
     */
    public function setRcontent($rcontent)
    {
        $this->rcontent = $rcontent;
    }

 /**
     * @param Ambigous <NULL, unknown> $lasttime
     */
    public function setLasttime($lasttime)
    {
        $this->lasttime = $lasttime;
    }

 /**
     * @param Ambigous <NULL, unknown> $rclicknum
     */
    public function setRclicknum($rclicknum)
    {
        $this->rclicknum = $rclicknum;
    }

 /**
     * @param Ambigous <NULL, unknown> $rreplynum
     */
    public function setRreplynum($rreplynum)
    {
        $this->rreplynum = $rreplynum;
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
    //Zend\Stdlib\Hydrator\ArraySerializable::extract expects the provided object to implement getArrayCopy()
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
  
}

?>
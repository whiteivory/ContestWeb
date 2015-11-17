<?php
// Filename: /module/Blog/src/Blog/Model/Post.php
namespace Forum\Model;

class Page
{
    private $pageID;
    private $secID;
    private $schID;
    private $secname;
    private $userID;
    private $username;
    private $ptitle;
    private $ptime;
    private $pcontent;
    private $lasttime;
    private $ptype;
    private $pclicknum;
    private $preplynum;
    private $pzannum;
    private $pallow; //是否允许外校人查看本贴
    private $filepath;
    public function getSchID()
    {
        return $this->schID;
    }

 public function setSchID($schID)
    {
        $this->schID = $schID;
    }

 public function exchangeArray($data)
    {
        $this->pageID     = (isset($data['pageID']))     ? $data['pageID']     : null;
        $this->secID = (isset($data['secID'])) ? $data['secID'] : null;
        $this->secname  = (isset($data['secname']))  ? $data['secname']  : null;
        $this->userID = (isset($data['userID']))     ? $data['userID']     : null;
        $this->username= (isset($data['username']))     ? $data['username']     : null;
        $this->ptitle= (isset($data['ptitle']))     ? $data['ptitle']     : null;
        $this->pcontent= (isset($data['pcontent']))     ? $data['pcontent']     : null;
        $this->ptime= (isset($data['ptime']))     ? $data['ptime']     : null;
        $this->lasttime= (isset($data['lasttime']))     ? $data['lasttime']     : null;
        $this->ptype= (isset($data['ptype']))     ? $data['ptype']     : null;
        $this->pclicknum= (isset($data['pclicknum']))     ? $data['pclicknum']     : null;
        $this->preplynum= (isset($data['preplynum']))     ? $data['preplynum']     : null;
        $this->pzannum= (isset($data['pzannum']))     ? $data['pzannum']     : null;
        $this->pallow= (isset($data['pallow']))     ? $data['pallow']     : null;
        $this->filepath= (isset($data['filepath']))     ? $data['filepath']     : null;
    }
    //Zend\Stdlib\Hydrator\ArraySerializable::extract expects the provided object to implement getArrayCopy()
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
 public function getPageID()
    {
        return $this->pageID;
    }

 public function getFilepath()
    {
        return $this->filepath;
    }

 public function setPageID($pageID)
    {
        $this->pageID = $pageID;
    }

 public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }
 public function getSecID()
    {
        return $this->secID;
    }

 public function getSecname()
    {
        return $this->secname;
    }

 public function getUserID()
    {
        return $this->userID;
    }

 public function getUsername()
    {
        return $this->username;
    }

 public function getPtitle()
    {
        return $this->ptitle;
    }

 public function getPtime()
    {
        return $this->ptime;
    }

 public function getPcontent()
    {
        return $this->pcontent;
    }

 public function getLasttime()
    {
        return $this->lasttime;
    }

 public function getPtype()
    {
        return $this->ptype;
    }

 public function getPclicknum()
    {
        return $this->pclicknum;
    }

 public function getPreplynum()
    {
        return $this->preplynum;
    }

 public function getPzannum()
    {
        return $this->pzannum;
    }

 public function getPallow()
    {
        return $this->pallow;
    }
 public function setSecID($secID)
    {
        $this->secID = $secID;
    }

 public function setSecname($secname)
    {
        $this->secname = $secname;
    }

 public function setUserID($userID)
    {
        $this->userID = $userID;
    }

 public function setUsername($username)
    {
        $this->username = $username;
    }

 public function setPtitle($ptitle)
    {
        $this->ptitle = $ptitle;
    }

 public function setPtime($ptime)
    {
        $this->ptime = $ptime;
    }

 public function setPcontent($pcontent)
    {
        $this->pcontent = $pcontent;
    }

 public function setLasttime($lasttime)
    {
        $this->lasttime = $lasttime;
    }

 public function setPtype($ptype)
    {
        $this->ptype = $ptype;
    }

 public function setPclicknum($pclicknum)
    {
        $this->pclicknum = $pclicknum;
    }

 public function setPreplynum($preplynum)
    {
        $this->preplynum = $preplynum;
    }

 public function setPzannum($pzannum)
    {
        $this->pzannum = $pzannum;
    }

 public function setPallow($pallow)
    {
        $this->pallow = $pallow;
    }

}
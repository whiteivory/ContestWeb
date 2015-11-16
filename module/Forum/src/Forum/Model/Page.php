<?php
// Filename: /module/Blog/src/Blog/Model/Post.php
namespace Forum\Model;

class Page implements PageInterface
{
    private $postID;
    private $secID;
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
 public function getPostID()
    {
        return $this->postID;
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

 public function setPostID($postID)
    {
        $this->postID = $postID;
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
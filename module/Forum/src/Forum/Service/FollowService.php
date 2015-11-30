<?php
namespace Forum\Service;
use Forum\Mapper\FollowMapper;
use Forum\Model\Follow;
class FollowService{
    protected $followMapper;
    public function __construct(FollowMapper $followMapper)
    {
        $this->followMapper = $followMapper;
    }
    public function getFollows($pageID)
    {
        // TODO: Implement findAllPosts() method.
        return $this->followMapper->findAll($pageID);
    }
    public function saveFollow(Follow $followObject){
        $followObject->setFollowID($this->getNewFollowID());
        $this->followMapper->save($followObject);
    }
    public function getNewFollowID(){
        return $this->followMapper->getNewFollowID();
    }
}
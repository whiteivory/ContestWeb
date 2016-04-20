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
    public function getSimi($pageID){
        return $this->followMapper->getSimi($pageID);
    }
    public function getStar($userID,$pageID){
        return $this->followMapper->getStar($userID, $pageID);
    }
    public function saveFollow(Follow $followObject){
        $followObject->setFollowID($this->getNewFollowID());
        $this->followMapper->save($followObject);
        $pageID=$followObject->getPageID();
        $this->followMapper->updateLastReplyTime($pageID);
        $this->followMapper->updateReplynum($pageID);
    }
    public function getNewFollowID(){
        return $this->followMapper->getNewFollowID();
    }
    public function updateClicktime($id){
        return $this->followMapper->updateClicktime($id);
    }
}
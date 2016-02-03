<?php
namespace Forum\Service;
use Forum\Mapper\RFollowMapper;
use Forum\Model\RFollow;
class RFollowService{
    protected $followMapper;
    public function __construct(RFollowMapper $followMapper)
    {
        $this->followMapper = $followMapper;
    }
    public function getRFollows($recruitID)
    {
        // TODO: Implement findAllPosts() method.
        return $this->followMapper->findAll($recruitID);
    }
    public function saveRFollow(RFollow $followObject){
        $followObject->setRFollowID($this->getNewRFollowID());
        $this->followMapper->save($followObject);
    }
    public function getNewRFollowID(){
        return $this->followMapper->getNewRFollowID();
    }
}
<?php
namespace Forum\Service;
 use Zend\Db\Adapter\AdapterInterface;

class AdminService
{
    protected $dbAdapter;
    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }
    public function deleteUser($userId){
        $sql="set @pid = $userId ;";
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
        $sql="call deleteUser(@pid) ;";
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
    }
    public function deletePage($pageId){
        $sql="set @pid = $pageId ;";
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
        $sql="call deletePage(@pid) ;";
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
    }
}

?>
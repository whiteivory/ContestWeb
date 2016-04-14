<?php
namespace Forum\Mapper;

use Forum\Model\Follow;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Debug\Debug;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Insert;
use Application\Common\WHydrateResultset;
use Zend\Crypt\PublicKey\Rsa\PublicKey;
use Forum\Model\Page;

class FollowMapper
{
    /**
     * @var \Zend\Db\Adapter\AdapterInterface
     */
    protected $dbAdapter;
    protected $hydrator;
    protected $followPrototype;
    /**
     *@var \ArrayObject
     */
    protected $prototypeArr;
    public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator,
        Follow $followPrototype,\ArrayObject $prototypeArr)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator       = $hydrator;
        $this->followPrototype  = $followPrototype;
        $this->prototypeArr=$prototypeArr;
    }
    public function save(Follow $followObject){
        $postData = $this->hydrator->extract($followObject);
        //           Debug::dump($postData);
        /*
         * 下面这两行一定记得自己加上去
        */
        $id= $followObject->getUser()->getUserID();
        $postData['userID']=$id;
//         unset($postData['secname']);//等到更改成类的时候需要利用php的特性改变成员变量的类型，class变成id
        //           unset($postData['username']);//虽然还是比较麻烦，但是只要写一个类就够了，不需要再unset这么多了。
        $action = new Insert('follow');
        $action->values($postData);
        
        $sql    = new Sql($this->dbAdapter);
        $stmt   = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();
        
        //update replynum
        $sql2="update page set preplynum=preplynum+1 where pageID=$id";
        $stmt2=$this->dbAdapter->query($sql2);
        $stmt2->execute();
    }
    public function findAll($pageID){
        $sql="select * from follow join user on follow.userID = user.userID where pageID=$pageID ";

        //         echo $sql;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
        //         foreach ($result as $row){
        //             Debug::dump($row);
        //         }
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new WHydrateResultset($this->hydrator, $this->followPrototype,$this->prototypeArr);
            $tmp=$resultSet->initialize($result);
            //              foreach ($resultSet as $row){
            //                  Debug::dump($row);
            //              }
            return $tmp;
        }
    
        return array();
    }
    public function getSimi($pageID){
        //注意这里sql语句别名的运用刚好满足hydrate的对应
        $sql="select simipages.simiId pageID,userID,ptitle,ptime,pcontent,pzannum from simipages join page 
            on simipages.simiId = page.pageID where itemId=$pageID and pallow = 1 and similarity<> 0 order by similarity desc";
        
        //         echo $sql;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
//                 foreach ($result as $row){
//                     Debug::dump($row);
//                 }
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new HydratingResultSet($this->hydrator, new Page());
            $tmp=$resultSet->initialize($result);
//                          foreach ($resultSet as $row){
//                              Debug::dump($row);
//                          }
            return $tmp;
        }
        
        return array();
    }
    public function getNewFollowID(){
        $sql="select max(followID) from follow";
        //         echo $sql;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
        return $result->current()['max(followID)']+1;
    }
    public function updateClicktime($id){
        $sql="update page set pclicknum=pclicknum+1 where pageID=$id";
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
    }
    public function updateLastReplyTime($id){
        $time=date('y-m-d h:i:s',time());
        $sql="update page set lasttime='$time' where pageID=$id";
//         Debug::dump($sql);
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
    }
    public function updateReplynum($id){
        $sql="update page set preplynum=preplynum+1 where pageID=$id";
        $statement=$this->dbAdapter->query($sql);
        $statement->execute();
    }
}
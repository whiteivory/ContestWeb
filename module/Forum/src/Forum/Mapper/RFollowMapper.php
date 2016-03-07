<?php
namespace Forum\Mapper;

use Forum\Model\RFollow;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Debug\Debug;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Insert;
use Application\Common\WHydrateResultset;

class RFollowMapper
{
    /**
     * @var \Zend\Db\Adapter\AdapterInterface
     */
    protected $dbAdapter;
    protected $hydrator;
    protected $rfollowPrototype;
    /**
     *@var \ArrayObject
     */
    protected $prototypeArr;
    public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator,
        RFollow $followPrototype,\ArrayObject $prototypeArr)
    {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator       = $hydrator;
        $this->rfollowPrototype = $followPrototype;
        $this->prototypeArr=$prototypeArr;
    }
    public function save(RFollow $followObject){
        $postData = $this->hydrator->extract($followObject);
        //           Debug::dump($postData);
        /*
         * 下面这两行一定记得自己加上去
        */
        $postData['userID']=$followObject->getUser()->getUserID();
//         unset($postData['secname']);//等到更改成类的时候需要利用php的特性改变成员变量的类型，class变成id
        //           unset($postData['username']);//虽然还是比较麻烦，但是只要写一个类就够了，不需要再unset这么多了。
        $action = new Insert('rfollow');
        $action->values($postData);
        
        $sql    = new Sql($this->dbAdapter);
        $stmt   = $sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();
    }
    public function findAll($recruitID){
        $sql="select * from rfollow join user on rfollow.userID = user.userID where recruitID=$recruitID ";

        //         echo $sql;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
        //         foreach ($result as $row){
        //             Debug::dump($row);
        //         }
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new WHydrateResultset($this->hydrator, $this->rfollowPrototype,$this->prototypeArr);
            $tmp=$resultSet->initialize($result);
            //              foreach ($resultSet as $row){
            //                  Debug::dump($row);
            //              }
            return $tmp;
        }
    
        return array();
    }
    public function getNewRFollowID(){
        $sql="select max(rfollowID) from rfollow";
        //         echo $sql;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
        return $result->current()['max(rfollowID)']+1;
    }
}
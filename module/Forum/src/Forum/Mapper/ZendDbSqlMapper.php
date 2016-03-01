<?php
namespace Forum\Mapper;

 use Forum\Model\Page;
 use Zend\Db\Adapter\AdapterInterface;
 use Zend\Db\Adapter\Driver\ResultInterface;
 use Zend\Db\ResultSet\HydratingResultSet;
 use Zend\Db\Sql\Sql;
 use Zend\Debug\Debug;
 use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Insert;
use Application\Common\WHydrateResultset;
  
 class ZendDbSqlMapper implements PageMapperInterface
 {
     /**
      * @var \Zend\Db\Adapter\AdapterInterface
      */
     protected $dbAdapter;
     protected $hydrator;
     protected $pagePrototype;
     /**
      *@var \ArrayObject
      */
     protected $prototypeArr;

     /**
      * @param AdapterInterface  $dbAdapter
      */
     public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator,
         Page $pagePrototype,\ArrayObject $prototypeArr)
     {
         $this->dbAdapter = $dbAdapter;
         $this->hydrator       = $hydrator;
         $this->pagePrototype  = $pagePrototype;
         $this->prototypeArr=$prototypeArr;
     }

     /**
      * @param int|string $id
      *
      * @return PostInterface
      * @throws \InvalidArgumentException
      */
     public function find($id)
     {
//          $sql    = new Sql($this->dbAdapter);
//          $select = $sql->select('page');
//          $select->join('user','page.userID=user.userID');
         
//          $stmt   = $sql->prepareStatementForSqlObject($select);
         
         $sql='select page.*,user.* from page  join user on page.userID=user.userID where pageID='.$id;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
         
             if ($result instanceof ResultInterface && $result->isQueryResult()) {
             $resultSet = new WHydrateResultset($this->hydrator, $this->pagePrototype,$this->prototypeArr);
             $tmp=$resultSet->initialize($result);
//              foreach ($resultSet as $row){
//                  Debug::dump($row);
//              }
             return $tmp;
        }
         
         throw new \InvalidArgumentException("Forum with given ID:{$id} not found.");
     }
     
     public function findAll($secID,$ptype,$schID){
        $sql="select * from page ";
        $sql =$sql. " join user on page.userID=user.userID ";
        $sql=$sql."where ";
        if($secID!=0){
            $sql =$sql." secID=$secID ";
            if($ptype!=0)
                $sql=$sql.' and ';
        }
        if($ptype!=0) $sql=$sql." ptype=$ptype ";
        if($ptype!=0||$secID!=0){
            $sql=$sql.' and ';
        }
        if($schID!=0){
            $sql=$sql.'(pallow=1 or (pallow=0 and schID='.$schID.' ))';
        }
        else{
            $sql=$sql.'(pallow=1)';
        }
//         echo $sql;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
//         foreach ($result as $row){
//             Debug::dump($row);
//         }
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
             $resultSet = new WHydrateResultset($this->hydrator, $this->pagePrototype,$this->prototypeArr);
             $tmp=$resultSet->initialize($result);
//              foreach ($resultSet as $row){
//                  Debug::dump($row);
//              }
             return $tmp;
        }

        return array();
     }
     //单纯的resultset方式
     public function findAllres(){
         $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('core_pages');
         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();
         $resultset=new ResultSet();
         $resultset->initialize($result);
         return $resultset;
     }
     public function save(Page $pageObject)
     {
          $postData = $this->hydrator->extract($pageObject);
//           Debug::dump($postData);
          /*
           * 下面这两行一定记得自己加上去
           */
          $postData['userID']=$pageObject->getUser()->getUserID();
          unset($postData['secname']);//等到更改成类的时候需要利用php的特性改变成员变量的类型，class变成id
//           unset($postData['username']);//虽然还是比较麻烦，但是只要写一个类就够了，不需要再unset这么多了。
          $action = new Insert('page');
          $action->values($postData);
          
         $sql    = new Sql($this->dbAdapter);
         $stmt   = $sql->prepareStatementForSqlObject($action);
         $result = $stmt->execute();
          
//          if ($result instanceof ResultInterface) {
//              if ($newId = $result->getGeneratedValue()) {
//                  // When a value has been generated, set it on the object
//                  $pageObject->setId($newId);
//              }
              
//              return $pageObject;
//          }
          
//          throw new \Exception("Database error");
     }
     public function getNewPageID(){
        $sql1='select max(pageID) from page';
        $statement=$this->dbAdapter->query($sql1);
        $result=$statement->execute();
        $row=$result->current();
//         Debug::dump($row  );
        return $row['max(pageID)']+1;
     }
 }
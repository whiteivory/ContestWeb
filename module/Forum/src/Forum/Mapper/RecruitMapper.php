<?php
namespace Forum\Mapper;

 use Zend\Db\Adapter\AdapterInterface;
 use Zend\Db\Adapter\Driver\ResultInterface;
 use Zend\Db\ResultSet\HydratingResultSet;
 use Zend\Db\Sql\Sql;
 use Zend\Debug\Debug;
 use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Insert;
use Application\Common\WHydrateResultset;
use Forum\Model\Recruit;
   
 class RecruitMapper
 {
     /**
      * @var \Zend\Db\Adapter\AdapterInterface
      */
     protected $dbAdapter;
     protected $hydrator;
     protected $recruitPrototype;
     /**
      *@var \ArrayObject
      */
     protected $prototypeArr;

     /**
      * @param AdapterInterface  $dbAdapter
      */
     public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator,
          Recruit $recruitPrototype,\ArrayObject $prototypeArr)
     {
         $this->dbAdapter = $dbAdapter;
         $this->hydrator       = $hydrator;
         $this->recruitPrototype  = $recruitPrototype;
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
         $sql='select recruit.*,user.* from recruit  join user on recruit.userID=user.userID where recruitID='.$id;
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
         
             if ($result instanceof ResultInterface && $result->isQueryResult()) {
             $resultSet = new WHydrateResultset($this->hydrator, $this->recruitPrototype,$this->prototypeArr);
             $tmp=$resultSet->initialize($result);
//              foreach ($resultSet as $row){
//                  Debug::dump($row);
//              }
             return $tmp;
        }
         
         throw new \InvalidArgumentException("Forum with given ID:{$id} not found.");
     }
     
     public function findAll($schID,$tag,$type){
        $sql="select * from recruit ";
        $sql =$sql. " join user on recruit.userID=user.userID ";
        $sql=$sql."where ";
        
        if($tag!==0){//注意===的用法！
            $sql =$sql." tag='$tag' "."and ";
        }
        $sql=$sql."schID =$schID"." and ";
        $sql=$sql."type = $type";
        $statement=$this->dbAdapter->query($sql);
        $result=$statement->execute();
//         foreach ($result as $row){
//             Debug::dump($row);
//         }
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
             $resultSet = new WHydrateResultset($this->hydrator, $this->recruitPrototype,$this->prototypeArr);
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
     public function save(Recruit $recruitObject)
     {
          $postData = $this->hydrator->extract($recruitObject);
//           Debug::dump($postData);
          /*
           * 下面这两行一定记得自己加上去
           */
          $postData['userID']=$recruitObject->getUser()->getUserID();
//           unset($postData['secname']);//等到更改成类的时候需要利用php的特性改变成员变量的类型，class变成id
//           unset($postData['username']);//虽然还是比较麻烦，但是只要写一个类就够了，不需要再unset这么多了。
          $action = new Insert('recruit');
          $action->values($postData);
          
         $sql    = new Sql($this->dbAdapter);
         $stmt   = $sql->prepareStatementForSqlObject($action);
         $result = $stmt->execute();
          
//          if ($result instanceof ResultInterface) {
//              if ($newId = $result->getGeneratedValue()) {
//                  // When a value has been generated, set it on the object
//                  $recruitObject->setId($newId);
//              }
              
//              return $recruitObject;
//          }
          
//          throw new \Exception("Database error");
     }
     public function getNewRecruitID(){
        $sql1='select max(recruitID) from recruit';
        $statement=$this->dbAdapter->query($sql1);
        $result=$statement->execute();
        $row=$result->current();
//         Debug::dump($row  );
        return $row['max(recruitID)']+1;
     }
 }
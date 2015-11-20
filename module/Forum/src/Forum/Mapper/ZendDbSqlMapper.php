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
  
 class ZendDbSqlMapper implements PageMapperInterface
 {
     /**
      * @var \Zend\Db\Adapter\AdapterInterface
      */
     protected $dbAdapter;
     protected $hydrator;
     protected $pagePrototype;

     /**
      * @param AdapterInterface  $dbAdapter
      */
     public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator,
         Page $pagePrototype)
     {
         $this->dbAdapter = $dbAdapter;
         $this->hydrator       = $hydrator;
         $this->pagePrototype  = $pagePrototype;
     }

     /**
      * @param int|string $id
      *
      * @return PostInterface
      * @throws \InvalidArgumentException
      */
     public function find($id)
     {
         $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('core_pages');
         $select->where(array('id = ?' => $id));
         
         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();
         
         if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
        
             $temp = $this->hydrator->hydrate($result->current(), $this->pagePrototype);
             //\Zend\Debug\Debug::dump($temp); die();
             return temp;
         }
         
         throw new \InvalidArgumentException("Forum with given ID:{$id} not found.");
     }
     
     public function findAll($secID,$ptype,$schID){
        $sql="select * from page ";
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
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
             $resultSet = new HydratingResultSet($this->hydrator, $this->pagePrototype);
             return $resultSet->initialize($result);
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
          $postData=$postData['arrayCopy'];
          unset($postData['secname']);
          unset($postData['username']);
             $action = new Insert('page');
             $action->values($postData);
// // //          }
          
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
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

     /**
      * @return array|PostInterface[]
      */
     public function findAll()
     {
           $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('core_pages');

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();

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
          $postData=$postData['arrayCopy'];
          unset($postData['secname']);
          unset($postData['username']);
//          unset($postData['id']); // Neither Insert nor Update needs the ID in the array
          
//          if ($pageObject->getId()) {
//              // ID present, it's an Update
//              $action = new Update('posts');
//              $action->set($postData);
//              $action->where(array('id = ?' => $pageObject->getId()));
//          } else {
             // ID NOT present, it's an Insert
//              Debug::dump($postData);
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
 }
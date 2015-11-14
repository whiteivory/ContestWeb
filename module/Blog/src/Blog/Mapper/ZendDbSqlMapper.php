<?php
namespace Blog\Mapper;

 use Blog\Model\PageInterface;
 use Zend\Db\Adapter\AdapterInterface;
 use Zend\Db\Adapter\Driver\ResultInterface;
 use Zend\Db\ResultSet\HydratingResultSet;
 use Zend\Db\Sql\Sql;
 use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\ResultSet\ResultSet;
 
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
         PageInterface $pagePrototype)
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
         
         throw new \InvalidArgumentException("Blog with given ID:{$id} not found.");
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
     public function findAll22(){
         
     }
 }
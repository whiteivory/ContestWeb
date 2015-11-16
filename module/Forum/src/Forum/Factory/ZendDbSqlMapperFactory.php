<?php
namespace Forum\Factory;

use Forum\Model\Page;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Forum\Mapper\ZendDbSqlMapper;
use Zend\Stdlib\Hydrator\ClassMethods;

class ZendDbSqlMapperFactory implements  FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ZendDbSqlMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false),
            new Page()
        );
    }
}
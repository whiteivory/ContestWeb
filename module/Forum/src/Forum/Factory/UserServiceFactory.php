<?php
namespace Forum\Factory;

use Forum\Service\UserService;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;
use Zend\Stdlib\Hydrator\Filter\FilterComposite;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class UserServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $classmethod=new ClassMethods(false);
        $classmethod->addFilter("arraycoppy",
            new MethodMatchFilter("getArrayCopy"),
            FilterComposite::CONDITION_AND
        );
        $classmethod->addFilter("inputFilter",
            new MethodMatchFilter("getInputFilter"),
            FilterComposite::CONDITION_AND
        );
        return new UserService(
            $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            $classmethod
        );
    }
}
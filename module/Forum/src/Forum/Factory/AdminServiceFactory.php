<?php
namespace Forum\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Forum\Service\AdminService;
class AdminServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new AdminService(
            $serviceLocator->get('Zend\Db\Adapter\Adapter')
        );
    }
}

?>
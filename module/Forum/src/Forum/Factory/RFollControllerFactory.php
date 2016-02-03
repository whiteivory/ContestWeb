<?php
namespace Forum\Factory;

use Zend\ServiceManager\FactoryInterface;
use Forum\Controller\RFollowController;
use Zend\ServiceManager\ServiceLocatorInterface;
class RFollControllerFactory implements FactoryInterface
{ 
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
//         $realServiceLocator = $serviceLocator->getServiceLocator();
//         $pageService        = $realServiceLocator->get('Forum\Service\PageServiceInterface');
    
        return new RFollowController();
    }
    
}

?>
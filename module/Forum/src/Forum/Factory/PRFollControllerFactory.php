<?php
namespace Forum\Factory;

use Zend\ServiceManager\FactoryInterface;
use Forum\Controller\PRFollowController;
use Zend\ServiceManager\ServiceLocatorInterface;
class PRFollControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        //         $realServiceLocator = $serviceLocator->getServiceLocator();
        //         $pageService        = $realServiceLocator->get('Forum\Service\PageServiceInterface');
    
        return new PRFollowController();
    }
}

?>
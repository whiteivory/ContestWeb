<?php
namespace Forum\Factory;

use Zend\ServiceManager\FactoryInterface;
use Forum\Controller\RecruitController;
use Zend\ServiceManager\ServiceLocatorInterface;
class RecruitControllerFactory implements  FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
//         $realServiceLocator = $serviceLocator->getServiceLocator();
//         $pageService        = $realServiceLocator->get('Forum\Service\PageServiceInterface');
    
        return new RecruitController();
    }
}

?>
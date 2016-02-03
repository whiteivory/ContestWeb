<?php
namespace Forum\Factory;

use Zend\ServiceManager\FactoryInterface;
use Forum\Controller\PRecruitController;
use Zend\ServiceManager\ServiceLocatorInterface;
class PRecruitControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        //         $realServiceLocator = $serviceLocator->getServiceLocator();
        //         $pageService        = $realServiceLocator->get('Forum\Service\PageServiceInterface');
    
        return new PRecruitController();
    }
}

?>
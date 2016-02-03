<?php
namespace Forum\Factory;

use Forum\Controller\RFollowController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RFollControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $followService        = $realServiceLocator->get('Forum\Service\RFollowServiceInterface');
        $recruitService =$realServiceLocator->get('Forum\Service\RecruitServiceInterface');
        return new RFollowController($followService,$recruitService);
    }
}
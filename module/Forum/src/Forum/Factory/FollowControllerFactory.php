<?php
namespace Forum\Factory;

use Forum\Controller\FollowController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FollowControllerFactory implements FactoryInterface
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
        $followService        = $realServiceLocator->get('Forum\Service\FollowServiceInterface');
        $pageService =$realServiceLocator->get('Forum\Service\PageServiceInterface');
        return new FollowController($followService,$pageService);
    }
}
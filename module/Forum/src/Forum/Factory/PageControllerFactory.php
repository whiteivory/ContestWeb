<?php
// Filename: /module/Blog/src/Blog/Factory/ListControllerFactory.php
namespace Forum\Factory;

use Forum\Controller\PageController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PageControllerFactory implements FactoryInterface
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
        $pageService        = $realServiceLocator->get('Forum\Service\PageServiceInterface');

        return new PageController($pageService);
    }
}
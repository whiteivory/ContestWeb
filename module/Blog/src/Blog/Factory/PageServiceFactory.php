<?php
namespace Blog\Factory;

use Blog\Service\PageService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PageServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PageService(
            $serviceLocator->get('Blog\Mapper\PageMapperInterface')
        );
    }
}
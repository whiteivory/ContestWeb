<?php
namespace Blog\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Blog\Service\PageServiceInterface;
use Blog\Service\PageService;
use Zend\View\Model\ViewModel;

class PageController  extends AbstractActionController
{
    protected $pageService;
    
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }
    
    public function indexAction()
    {
        return new ViewModel(array(
            'pages' => $this->pageService->getPages()
        ));
    }
}
<?php
// Filename: /module/Blog/src/Blog/Service/PostService.php
namespace Blog\Service;
use Blog\Mapper\PageMapperInterface;

class PageService implements  PageServiceInterface
{
    protected $pageMapper;
    public function __construct(PageMapperInterface $pageMapper)
    {
        $this->pageMapper = $pageMapper;
    }
    /**
     * {@inheritDoc}
     */
    public function getPages()
    {
        // TODO: Implement findAllPosts() method.
        return $this->pageMapper->findAll();
    }

    /**
     * {@inheritDoc}
     */
    public function getPage($id)
    {
        // TODO: Implement findPost() method.
        return $this->pageMapper->find($id);
    }
}
<?php
// Filename: /module/Forum/src/Blog/Service/PostService.php
namespace Forum\Service;
use Forum\Mapper\ZendDbSqlMapper;
use Forum\Model\Page;

class PageService
{
    protected $pageMapper;
    public function __construct(ZendDbSqlMapper $pageMapper)
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
    
    public function savePage(Page $page)
    {
        return $this->pageMapper->save($page);
    }
}
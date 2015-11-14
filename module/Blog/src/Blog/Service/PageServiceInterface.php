<?php
namespace Blog\Service;

use Blog\Model\PageInterface;

interface PageServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function getPage($id);
    public function getPages();
}
<?php
namespace Forum\Service;

use Forum\Model\PageInterface;

interface PageServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function getPage($id);
    public function getPages();
}
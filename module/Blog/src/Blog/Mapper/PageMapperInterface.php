<?php
namespace Blog\Mapper;

use Blog\Model\PageInterface;

interface PageMapperInterface
{
    /**
     * @param int|string $id
     * @return PostInterface
     * @throws \InvalidArgumentException
     */
    public function find($id);

    /**
     * @return array|PostInterface[]
    */
    public function findAll();
}
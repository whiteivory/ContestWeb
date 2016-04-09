<?php
namespace Forum\Mapper;

use Forum\Model\PageInterface;

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
    public function findAll($secID,$ptype,$schID,$limit,$offset);
}
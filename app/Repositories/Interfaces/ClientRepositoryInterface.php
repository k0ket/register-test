<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface ClientRepositoryInterface
{
    /**
     * @param null $sort
     * @param null $sortBy
     * @param null $filter
     * @param null $filterBy
     *
     * @return array
     */
    public function getAccounts($sort = null, $sortBy = null, $filter = null, $filterBy = null):array;
}

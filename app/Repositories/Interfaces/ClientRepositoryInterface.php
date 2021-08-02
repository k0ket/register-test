<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

interface ClientRepositoryInterface
{
    public function getAccounts($sort = null, $sortBy = null, $filter = null, $filterBy = null);
}

<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @param null $sort
     * @param null $sortBy
     * @param null $filter
     * @param null $filterBy
     *
     * @return array
     */
    public function getAccounts($sort = null, $sortBy = null, $filter = null, $filterBy = null): array
    {
        $client  = Client::query();
        $perPage = 3;

        if ($sort) {
            $sortBy ? $client->orderBy($sort, $sortBy) : $client->orderBy($sort);
        }

        if ($filter && $filterBy) {
            $client->where($filterBy, 'LIKE', '%' . $filter . '%');
        }

        return $client
            ->with('user')
            ->paginate($perPage)
            ->toArray();
    }
}

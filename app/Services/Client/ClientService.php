<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Models\Client;
use App\Models\CreateClientModelInterface;

class ClientService implements ClientServiceInterface
{
    /**
     * @var \App\Services\Client\ClientCreatorInterface
     */
    private ClientCreatorInterface $creator;

    /**
     * @param \App\Services\Client\ClientCreatorInterface $creator
     */
    public function __construct(ClientCreatorInterface $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @param \App\Models\CreateClientModelInterface $model
     *
     * @return \App\Models\Client
     */
    public function create(CreateClientModelInterface $model): Client
    {
        return $this->creator->create($model);
    }
}

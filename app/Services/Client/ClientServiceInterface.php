<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Models\Client;
use App\Models\CreateClientModelInterface;

interface ClientServiceInterface
{
    /**
     * @param \App\Models\CreateClientModelInterface $model
     *
     * @return \App\Models\Client
     */
    public function create(CreateClientModelInterface $model): Client;
}

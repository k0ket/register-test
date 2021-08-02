<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\Client;
use App\Models\CreateUserModelInterface;
use App\Models\User;

interface UserCreatorInterface
{
    /**
     * @param \App\Models\CreateUserModelInterface $model
     * @param \App\Models\Client                   $client
     *
     * @return \App\Models\User
     */
    public function create(CreateUserModelInterface $model, Client $client): User;
}

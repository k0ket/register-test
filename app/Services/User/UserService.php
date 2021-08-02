<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\Client;
use App\Models\CreateUserModelInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    /**
     * @var \App\Services\User\UserCreatorInterface
     */
    private UserCreatorInterface $creator;


    /**
     * @param \App\Services\User\UserCreatorInterface $creator
     */
    public function __construct(UserCreatorInterface $creator)
    {
        $this->creator = $creator;
    }

    /**
     * @param \App\Models\CreateUserModelInterface $model
     * @param \App\Models\Client                   $client
     *
     * @return \App\Models\User
     */
    public function create(CreateUserModelInterface $model, Client $client): User
    {
        return $this->creator->create($model, $client);
    }
}

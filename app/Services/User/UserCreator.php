<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Enum\ActiveStatus;
use App\Models\Client;
use App\Models\CreateUserModelInterface;
use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Carbon;

class UserCreator implements UserCreatorInterface
{
    /**
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    private Hasher $hasher;

    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param \App\Models\CreateUserModelInterface $model
     * @param \App\Models\Client                   $client
     *
     * @return \App\Models\User
     */
    public function create(CreateUserModelInterface $model, Client $client): User
    {
        $user = new User();
        $user->client()->associate($client);

        $user->first_name          = $model->getFirstName();
        $user->last_name           = $model->getLastName();
        $user->email               = $model->getEmail();
        $user->phone               = $model->getPhone();
        $user->profile_uri         = $model->getFirstName() . '-' . $model->getLastName();
        $user->last_password_reset = Carbon::now();
        $user->password            = $this->hasher->make($model->getPassword());
        $user->status              = ActiveStatus::inactive();

        $user->save();

        return $user;
    }
}

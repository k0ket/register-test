<?php

declare(strict_types=1);

namespace App\Api\v1\Auth\Controllers;

use App\Api\v1\Auth\Requests\RegisterRequest;
use App\Api\v1\Auth\Resource\ClientResource;
use App\Http\Controllers\Controller;
use App\Services\Client\ClientServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthController extends Controller
{
    /**
     * @var \App\Services\User\UserServiceInterface
     */
    private UserServiceInterface $userService;

    /**
     * @var \App\Services\Client\ClientServiceInterface
     */
    private ClientServiceInterface $clientService;

    /**
     * @param \App\Services\User\UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService, ClientServiceInterface $clientService)
    {
        $this->userService   = $userService;
        $this->clientService = $clientService;
    }


    public function register(RegisterRequest $request)
    {
        $client = $this->clientService->create($request);

        $this->userService->create($request, $client);

        return JsonResource::make(new ClientResource($client));
    }
}

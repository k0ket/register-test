<?php

declare(strict_types=1);

namespace App\Api\v1\Auth\Resource;

use App\Models\Client;
use App\Resource\JsonResource;

class ClientResource extends JsonResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed[]
     */
    public function toArray(): array
    {
        return [
            'name'     => $this->client->client_name,
            'address1' => $this->client->address1,
            'address2' => $this->client->address2,
            'city'     => $this->client->city,
            'state'    => $this->client->state,
            'country'  => $this->client->country,
            'zipCode'  => $this->client->zip,
            'phoneNo1' => $this->client->phone_no1,
            'phoneNo2' => $this->client->phone_no2,
            'user'     => [
                'firstName' => $this->client->user->first_name,
                'lastName'  => $this->client->user->last_name,
                'email'     => $this->client->user->email,
                'phone'     => $this->client->user->phone,
            ],
        ];
    }
}

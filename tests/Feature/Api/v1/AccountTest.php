<?php

namespace App\Tests\Feature\Api\v1;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use WithFaker;

    public function test_get_all_accounts_returns_with_paginate(): void
    {
        $response = $this->get(route('api.v1.admin.account'),
            [
                'sort'     => 'created_at',
                'sortBy'   => 'desc',
                'filter'   => 'phone_no1',
                'filterBy' => '31231123125',
                'page'     => '1',
            ]);

        $response
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data')
                ->has('meta')
                ->has('links')
            )
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'address1',
                        'address2',
                        'city',
                        'state',
                        'country',
                        'zipCode',
                        'latitude',
                        'longitude',
                        'phoneNo1',
                        'phoneNo2',
                        'totalUser',
                        'startValidity',
                        'endValidity',
                        'status',
                        'createdAt',
                        'updatedAt',
                    ],
                ],
            ]);
    }
}

<?php

namespace App\Tests\Feature\Api\v1;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use WithFaker;

    public function test_register_user_and_client_return_account(): void
    {
        $email    = $this->faker->email;
        $response = $this->post(route('api.v1.auth.register'), [
            'user'       => [
                'firstName'            => $this->faker->firstName,
                'lastName'             => $this->faker->lastName,
                'email'                => $email,
                'password'             => 'password*123',
                'passwordConfirmation' => 'password*123',
                'phone'                => $this->faker->e164PhoneNumber,
            ],
            'clientName' => $this->faker->name,
            'address1'   => $this->faker->streetAddress,
            'address2'   => $this->faker->streetAddress,
            'city'       => $this->faker->city,
            'state'      => $this->faker->state,
            'country'    => $this->faker->country,
            'phoneNo1'   => $this->faker->e164PhoneNumber,
            'phoneNo2'   => $this->faker->e164PhoneNumber,
            'zipCode'    => $this->faker->postcode,
        ]);

        $response->assertOk();
    }
}

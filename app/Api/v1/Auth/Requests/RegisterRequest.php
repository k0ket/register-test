<?php

declare(strict_types=1);

namespace App\Api\v1\Auth\Requests;

use App\Models\CreateClientModelInterface;
use App\Models\CreateUserModelInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class RegisterRequest extends FormRequest implements CreateUserModelInterface, CreateClientModelInterface
{
    public function rules(): array
    {
        return [
            'firstName'  => ['required', 'string', 'max:50'],
            'lastName'   => ['required', 'string', 'max:50'],
            'email'      => ['required', 'email', new Unique('users', 'email'), 'max:150'],
            'password'   => ['required', 'min:8', 'regex:/^(?=.*\d)(?=.*(_|[^\w])).+$/', 'max:256'],
            'phone'      => ['required', 'min:8', 'max:20', 'regex:/[0-9]{11}/'],
            'clientName' => ['required', 'string', 'max:100'],
            'address1'   => ['required', 'string'],
            'address2'   => ['string'],
            'city'       => ['required', 'string', 'max:100'],
            'state'      => ['required', 'string', 'max:100'],
            'country'    => ['required', 'string', 'max:100'],
            'phoneNo1'   => ['required', 'min:8', 'max:20', 'regex:/[0-9]{11}/'],
            'phoneNo2'   => ['required', 'min:8', 'max:20', 'regex:/[0-9]{11}/'],
            'zipCode'    => ['nullable', 'string', 'max:20'],
        ];
    }

    public function getFirstName(): string
    {
        return $this->input('firstName');
    }

    public function getLastName(): string
    {
        return $this->input('lastName');
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getPassword(): string
    {
        return $this->input('password');
    }

    public function getPhone(): string
    {
        return $this->input('phone');
    }

    public function getClientName(): string
    {
        return $this->input('clientName');
    }

    public function getAddress1(): string
    {
        return $this->input('address1');
    }

    public function getAddress2(): string
    {
        return $this->input('address2');
    }

    public function getCity(): string
    {
        return $this->input('city');
    }

    public function getState(): string
    {
        return $this->input('state');
    }

    public function getCountry(): string
    {
        return $this->input('country');
    }

    public function getPhoneNo1(): string
    {
        return $this->input('phoneNo1');
    }

    public function getPhoneNo2(): string
    {
        return $this->input('phoneNo2');
    }

    public function getZipCode(): string
    {
        return $this->input('zipCode');
    }
}

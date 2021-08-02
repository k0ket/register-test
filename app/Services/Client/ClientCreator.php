<?php

declare(strict_types=1);

namespace App\Services\Client;

use App\Enum\ActiveStatus;
use App\Models\Client;
use App\Models\CreateClientModelInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;
use Spatie\Geocoder\Geocoder;

class ClientCreator implements ClientCreatorInterface
{
    /**
     * @param \App\Models\CreateClientModelInterface $model
     *
     * @return \App\Models\Client
     */
    public function create(CreateClientModelInterface $model): Client
    {
        $client = new Client();

        $client->client_name    = $model->getClientName();
        $client->address1       = $model->getAddress1();
        $client->address2       = $model->getAddress2();
        $client->city           = $model->getCity();
        $client->state          = $model->getState();
        $client->country        = $model->getCountry();
        $client->latitude       = $this->getGeocode($model)['lat'];
        $client->longitude      = $this->getGeocode($model)['lng'];
        $client->phone_no1      = $model->getPhoneNo1();
        $client->phone_no2      = $model->getPhoneNo2();
        $client->zip            = $model->getZipCode();
        $client->start_validity = Carbon::now();
        $client->end_validity   = Carbon::now()->addDays(15);
        $client->status         = ActiveStatus::active();

        $client->save();
        $geo = $this->getGeocode($model)['lat'] . ', ' . $this->getGeocode($model)['lng'];
        Redis::hMset("client_" . $client->id, 'geo', $geo);

        return $client;
    }

    /**
     * @param \App\Models\CreateClientModelInterface $model
     *
     * @return array
     */
    protected function getGeocode(CreateClientModelInterface $model): array
    {
        $address = $this->getAddress($model);

        $client   = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey(config('geocoder.key'));

        return $geocoder->getCoordinatesForAddress($address);
    }

    /**
     * @param \App\Models\CreateClientModelInterface $model
     *
     * @return string
     */
    protected function getAddress(CreateClientModelInterface $model): string
    {
        return $model->getAddress1() . ' '
            . $model->getAddress2() . ', '
            . $model->getCity() . ', '
            . $model->getState() . ', '
            . $model->getCountry();
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $client_name
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property float $latitude
 * @property float $longitude
 * @property string $phone_no1
 * @property string $phone_no2
 * @property string $zip
 * @property \Illuminate\Support\Carbon $start_validity
 * @property \Illuminate\Support\Carbon $end_validity
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEndValidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhoneNo1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhoneNo2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereStartValidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereZip($value)
 * @mixin \Eloquent
 */
class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
        'phone_no1',
        'phone_no2',
        'zip',
        'start_validity',
        'end_validity',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_validity' => 'datetime',
        'end_validity'   => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}

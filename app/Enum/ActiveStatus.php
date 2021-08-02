<?php

declare(strict_types=1);

namespace App\Enum;

class ActiveStatus
{
    public const INACTIVE = 'Inactive';
    public const ACTIVE   = 'Active';

    public static function getValues(): array
    {
        return [
            'inactive' => self::INACTIVE,
            'active'   => self::ACTIVE,
        ];
    }

    /**
     * @return string
     */
    public static function inactive(): string
    {
        return static::INACTIVE;
    }

    /**
     * @return string
     */
    public static function active(): string
    {
        return static::ACTIVE;
    }
}

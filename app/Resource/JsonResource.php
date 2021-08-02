<?php

namespace App\Resource;

use JsonSerializable;

abstract class JsonResource implements JsonSerializable
{
    /**
     * @return mixed[]
     */
    abstract public function toArray();

    /**
     * @return mixed[]
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}

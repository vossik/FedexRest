<?php

namespace FedexRest\Services\Pickup\Entity;

class Weight
{
    protected string $units;
    protected float $value;

    public function prepare() : array {
        return [
            'units' => $this->units,
            'value' => $this->value,
        ];
    }

    public function setUnits(string $units) : Weight
    {
        $this->units = $units;

        return $this;
    }

    public function setValue(float $value) : Weight
    {
        $this->value = $value;

        return $this;
    }
}

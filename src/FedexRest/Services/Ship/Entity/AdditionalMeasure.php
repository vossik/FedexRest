<?php

namespace FedexRest\Services\Ship\Entity;

class AdditionalMeasure
{
    public function __construct(
        public int $quantity = 1,
        public string $units
    )
    {
        
    }

    public function prepare(): array
    {
        $data = [];

        $data['quantity'] = $this->quantity;
        $data['units'] = $this->units;

        return $data;
    }
}

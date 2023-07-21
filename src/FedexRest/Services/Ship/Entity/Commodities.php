<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;

class Commodities
{
    public string $description = '';
    public ?Value $customsValue = null;

    public function setDescription(string $description) : Commodities
    {
        $this->description = $description;

        return $this;
    }

    public function setCustomsValue(Value $value) : Commodities
    {
        $this->customsValue = $value;

        return $this;
    }

    public function prepare(): array
    {
        $data = [];

        $data['description'] = $this->description;

        if ($this->customsValue !== null) {
            $data['customsValue'] = $this->customsValue->prepare();
        }

        return $data;
    }
}

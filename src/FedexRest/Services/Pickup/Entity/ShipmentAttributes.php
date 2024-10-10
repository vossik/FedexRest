<?php

namespace FedexRest\Services\Pickup\Entity;

use FedexRest\Entity\Dimensions;

class ShipmentAttributes
{
    protected ?string $serviceType = null;
    protected ?\FedexRest\Entity\Weight $weight = null;
    protected ?string $packagingType = null;
    protected ?Dimensions $dimensions = null;

    public function prepare() : array {
        $data = [];

        if ($this->serviceType !== null) {
            $data['serviceType'] = $this->serviceType;
        }

        if ($this->weight !== null) {
            $data['weight'] = $this->weight->prepare();
        }

        if ($this->packagingType !== null) {
            $data['packagingType'] = $this->packagingType;
        }

        if ($this->dimensions !== null) {
            $data['dimensions'] = $this->dimensions->prepare();
        }

        return $data;
    }

    public function setServiceType(?string $serviceType = null) : ShipmentAttributes
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    public function setWeight(?Weight $weight = null) : ShipmentAttributes
    {
        $this->weight = $weight;

        return $this;
    }

    public function setPackagingType(?string $packagingType = null) : ShipmentAttributes
    {
        $this->packagingType = $packagingType;

        return $this;
    }

    public function setDimensions(?Dimensions $dimensions = null) : ShipmentAttributes
    {
        $this->dimensions = $dimensions;

        return $this;
    }
}

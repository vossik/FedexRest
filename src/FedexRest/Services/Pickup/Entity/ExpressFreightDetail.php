<?php

namespace FedexRest\Services\Pickup\Entity;

use FedexRest\Entity\Dimensions;

class ExpressFreightDetail
{
    protected ?string $truckType = null;
    protected ?string $service = null;
    protected ?string $trailerLength = null;
    protected ?string $bookingNumber = null;
    protected ?Dimensions $dimensions = null;

    public function prepare() : array {
        $data = [];

        if ($this->truckType !== null) {
            $data['truckType'] = $this->truckType;
        }

        if ($this->service !== null) {
            $data['service'] = $this->service;
        }

        if ($this->trailerLength !== null) {
            $data['trailerLength'] = $this->trailerLength;
        }

        if ($this->bookingNumber !== null) {
            $data['bookingNumber'] = $this->bookingNumber;
        }

        if ($this->dimensions !== null) {
            $data['dimensions'] = $this->dimensions->prepare();
        }

        return $data;
    }

    public function setTruckType(?string $truckType = null) : ExpressFreightDetail
    {
        $this->truckType = $truckType;

        return $this;
    }

    public function setService(?string $service = null) : ExpressFreightDetail
    {
        $this->service = $service;

        return $this;
    }

    public function setTrailerLength(?string $trailerLength = null) : ExpressFreightDetail
    {
        $this->trailerLength = $trailerLength;

        return $this;
    }

    public function setBookingNumber(?string $bookingNumber = null) : ExpressFreightDetail
    {
        $this->bookingNumber = $bookingNumber;

        return $this;
    }

    public function setDimensions(?Dimensions $dimensions = null) : ExpressFreightDetail
    {
        $this->dimensions = $dimensions;

        return $this;
    }
}

<?php

namespace FedexRest\Services\Pickup\Entity;

class Address
{
    protected array $streetLines = [];
    protected ?string $urbanizationCode = null;
    protected string $city;
    protected ?string $stateOrProvinceCode = null;
    protected string $postalCode;
    protected string $countryCode;
    protected ?bool $residential = null;
    protected ?string $addressClassification = null;

    public function prepare() : array {
        $data = [
            'streetLines' => $this->streetLines,
            'city' => $this->city,
            'postalCode' => $this->postalCode,
            'countryCode' => $this->countryCode,
        ];

        if ($this->urbanizationCode !== null) {
            $data['urbanizationCode'] = $this->urbanizationCode;
        }

        if ($this->stateOrProvinceCode !== null) {
            $data['stateOrProvinceCode'] = $this->stateOrProvinceCode;
        }

        if ($this->residential !== null) {
            $data['residential'] = $this->residential;
        }
        
        if ($this->addressClassification !== null) {
            $data['addressClassification'] = $this->addressClassification;
        }
        
        return $data;
    }

    public function setStreetLines(array $streetLines) : Address
    {
        $this->streetLines = $streetLines;

        return $this;
    }

    public function setUrbanizationCode(?string $urbanizationCode = null) : Address
    {
        $this->urbanizationCode = $urbanizationCode;

        return $this;
    }

    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    public function setStateOrProvinceCode(?string $stateOrProvinceCode = null) : Address
    {
        $this->stateOrProvinceCode = $stateOrProvinceCode;

        return $this;
    }

    public function setPostalCode(string $postalCode) : Address
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function setCountryCode(string $countryCode) : Address
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function setResidential(?bool $residential = null) : Address
    {
        $this->residential = $residential;

        return $this;
    }

    public function setAddressClassification(?string $addressClassification = null) : Address
    {
        $this->addressClassification = $addressClassification;

        return $this;
    }
}

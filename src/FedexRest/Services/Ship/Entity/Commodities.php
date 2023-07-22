<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Dimensions;

class Commodities
{
    public string $description = '';
    public ?Value $customsValue = null;
    public ?string $countryOfManufacture = null;
    public ?Value $unitPrice = null;
    public ?Dimensions $weight = null;
    public $additionalMeasures = null;
    public ?int $numberOfPieces = null;

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

    public function setCountryOfManufacture(string $countryOfManufacture) : Commodities
    {
        $this->countryOfManufacture = $countryOfManufacture;

        return $this;
    }

    public function setUnitPrice(Value $unitPrice) : Commodities
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function setWeight(Dimensions $weight) : Commodities
    {
        $this->weight = $weight;

        return $this;
    }

    public function setAdditionalMeasures(AdditionalMeasures $additionalMeasures) : Commodities
    {
        $this->additionalMeasures = $additionalMeasures;

        return $this;
    }

    public function setNumberOfPieces(int $numberOfPieces) : Commodities
    {
        $this->numberOfPieces = $numberOfPieces;

        return $this;
    }

    public function prepare(): array
    {
        $data = [];

        $data['description'] = $this->description;

        if ($this->customsValue !== null) {
            $data['customsValue'] = $this->customsValue->prepare();
        }

        if ($this->countryOfManufacture !== null) {
            $data['countryOfManufacture'] = $this->countryOfManufacture;
        }

        if ($this->unitPrice !== null) {
            $data['unitPrice'] = $this->unitPrice->prepare();
        }

        if ($this->weight !== null) {
            $data['weight'] = $this->weight->prepare();
        }

        if ($this->additionalMeasures !== null) {
            $data['additionalMeasures'] = $this->additionalMeasures->prepare();
        }

        if ($this->numberOfPieces !== null) {
            $data['numberOfPieces'] = $this->numberOfPieces;
        }

        return $data;
    }
}

<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Dimensions;
use FedexRest\Entity\Weight;

class Commodities
{
    public ?Value $unitPrice = null;
    public $additionalMeasures = null;
    public ?int $numberOfPieces = null;
    public ?int $quantity = null;
    public ?string $quantityUnits = null;
    public ?Value $customsValue = null;
    public ?string $countryOfManufacture = null;
    public ?string $cIMarksAndNumbers = null;
    public ?string $harmonizedCode = null;
    public string $description = '';
    public ?string $name = null;
    public ?Weight $weight = null;
    public ?string $exportLicenseNumber = null;
    public ?string $exportLicenseExpirationDate = null;
    public ?string $partNumber = null;
    public ?string $purpose = null;

    // TODO: usmcaDetail

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

    public function setWeight(Weight $weight) : Commodities
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

    public function setQuantity(int $quantity) : Commodities
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function setQuantityUnits(string $quantityUnits) : Commodities
    {
        $this->quantityUnits = $quantityUnits;

        return $this;
    }

    public function setCIMarksAndNumbers(string $cIMarksAndNumbers) : Commodities
    {
        $this->cIMarksAndNumbers = $cIMarksAndNumbers;

        return $this;
    }

    public function setHarmonizedCode(string $harmonizedCode) : Commodities
    {
        $this->harmonizedCode = $harmonizedCode;

        return $this;
    }

    public function setPurpose(string $purpose) : Commodities
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function setPartNumber(string $partNumber) : Commodities
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    public function setExportLicenseExpirationDate(string $exportLicenseExpirationDate) : Commodities
    {
        $this->exportLicenseExpirationDate = $exportLicenseExpirationDate;

        return $this;
    }

    public function setExportLicenseNumber(string $exportLicenseNumber) : Commodities
    {
        $this->exportLicenseNumber = $exportLicenseNumber;

        return $this;
    }

    public function setName(string $name) : Commodities
    {
        $this->name = $name;

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

        if ($this->quantity !== null) {
            $data['quantity'] = $this->quantity;
        }

        if ($this->quantityUnits !== null) {
            $data['quantityUnits'] = $this->quantityUnits;
        }

        if ($this->cIMarksAndNumbers !== null) {
            $data['cIMarksAndNumbers'] = $this->cIMarksAndNumbers;
        }

        if ($this->harmonizedCode !== null) {
            $data['harmonizedCode'] = $this->harmonizedCode;
        }

        if ($this->purpose !== null) {
            $data['purpose'] = $this->purpose;
        }

        if ($this->partNumber !== null) {
            $data['partNumber'] = $this->partNumber;
        }

        if ($this->exportLicenseExpirationDate !== null) {
            $data['exportLicenseExpirationDate'] = $this->exportLicenseExpirationDate;
        }

        if ($this->exportLicenseNumber !== null) {
            $data['exportLicenseNumber'] = $this->exportLicenseNumber;
        }

        if ($this->name !== null) {
            $data['name'] = $this->name;
        }

        return $data;
    }
}

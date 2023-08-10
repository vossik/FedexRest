<?php

namespace FedexRest\Services\Pickup\Entity;

class OriginDetail
{
    protected PickupLocation $pickupLocation;
    protected \DateTime $readyDateTimestamp;
    protected \DateTime $customerCloseTime;
    protected string $pickupDateType;
    protected ?string $packageLocation = null;
    protected ?string $buildingPart = null;
    protected ?string $buildingPartDescription = null;
    protected ?bool $earlyPickup = null;
    protected ?string $suppliesRequested = null;
    protected ?string $geographicalPostalCode = null;

    public function prepare() : array {
        $data = [];

        $data['pickupLocation'] = $this->pickupLocation->prepare();
        $data['readyDateTimestamp'] = $this->readyDateTimestamp->format('Y-m-d\TH:i:s');
        $data['customerCloseTime'] = $this->customerCloseTime->format('H:i:s');
        $data['pickupDateType'] = $this->pickupDateType;

        if ($this->packageLocation !== null) {
            $data['packageLocation'] = $this->packageLocation;
        }

        if ($this->buildingPart !== null) {
            $data['buildingPart'] = $this->buildingPart;
        }

        if ($this->buildingPartDescription !== null) {
            $data['buildingPartDescription'] = $this->buildingPartDescription;
        }

        if ($this->earlyPickup !== null) {
            $data['earlyPickup'] = $this->earlyPickup;
        }

        if ($this->suppliesRequested !== null) {
            $data['suppliesRequested'] = $this->suppliesRequested;
        }

        if ($this->geographicalPostalCode !== null) {
            $data['geographicalPostalCode'] = $this->geographicalPostalCode;
        }

    
        return $data;
    }

    public function setPickupLocation(PickupLocation $pickupLocation) : OriginDetail
    {
        $this->pickupLocation = $pickupLocation;

        return $this;
    }

    public function setReadyDateTimestamp(\DateTime $readyDateTimestamp) : OriginDetail
    {
        $this->readyDateTimestamp = $readyDateTimestamp;

        return $this;
    }

    public function setCustomerCloseTime(\DateTime $customerCloseTime) : OriginDetail
    {
        $this->customerCloseTime = $customerCloseTime;

        return $this;
    }

    public function setPickupDateType(string $pickupDateType) : OriginDetail
    {
        $this->pickupDateType = $pickupDateType;

        return $this;
    }

    public function setPackageLocation(?string $packageLocation = null) : OriginDetail
    {
        $this->packageLocation = $packageLocation;

        return $this;
    }
 
    public function setBuildingPart(?string $buildingPart = null) : OriginDetail
    {
        $this->buildingPart = $buildingPart;

        return $this;
    }

    public function setBuildingPartDescription(?string $buildingPartDescription = null) : OriginDetail
    {
        $this->buildingPartDescription = $buildingPartDescription;

        return $this;
    }

    public function setEarlyPickup(?bool $earlyPickup = null) : OriginDetail
    {
        $this->earlyPickup = $earlyPickup;

        return $this;
    }

    public function setSuppliesRequested(?string $suppliesRequested = null) : OriginDetail
    {
        $this->suppliesRequested = $suppliesRequested;

        return $this;
    }

    public function setGeographicalPostalCode(?string $geographicalPostalCode = null) : OriginDetail
    {
        $this->geographicalPostalCode = $geographicalPostalCode;

        return $this;
    }
}

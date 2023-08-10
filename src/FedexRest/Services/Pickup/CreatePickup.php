<?php

namespace FedexRest\Services\Pickup;

use FedexRest\Services\AbstractRequest;
use FedexRest\Services\Pickup\Entity\OriginDetail;
use FedexRest\Services\Pickup\Entity\PickupNotificationDetail;
use FedexRest\Services\Pickup\Entity\Weight;

class CreatePickup extends AbstractRequest
{
    protected string $associatedAccountNumber;
    protected OriginDetail $originDetail;
    protected ?string $associatedAccountNumberType = null;
    protected ?Weight $totalWeight = null;
    protected ?int $packageCount = null;
    protected string $carrierCode;
    protected ?string $remarks = null;
    protected ?string $countryRelationships = null;
    protected ?string $pickupType = null;
    protected ?string $trackingNumber = null;
    protected ?string $commodityDescription = null;
    protected ?PickupNotificationDetail $pickupNotificationDetail = null;

    /**
     * {@inheritDoc}
     */
    public function setApiEndpoint() {
        return '/pickup/v1/pickups';
    }

    public function prepare() : array {
        $data = [];

        $data['associatedAccountNumber']['value'] = $this->associatedAccountNumber;
        $data['originDetail'] = $this->originDetail->prepare();
        $data['carrierCode'] = $this->carrierCode;

        if ($this->totalWeight !== null) {
            $data['totalWeight'] = $this->totalWeight->prepare();
        }

        if ($this->associatedAccountNumberType !== null) {
            $data['associatedAccountNumberType'] = $this->associatedAccountNumberType;
        }

        if ($this->packageCount !== null) {
            $data['packageCount'] = $this->packageCount;
        }

        if ($this->remarks !== null) {
            $data['remarks'] = $this->remarks;
        }

        if ($this->countryRelationships !== null) {
            $data['countryRelationships'] = $this->countryRelationships;
        }

        if ($this->pickupType !== null) {
            $data['pickupType'] = $this->pickupType;
        }

        if ($this->trackingNumber !== null) {
            $data['trackingNumber'] = $this->trackingNumber;
        }

        if ($this->commodityDescription !== null) {
            $data['commodityDescription'] = $this->commodityDescription;
        }

        if ($this->pickupNotificationDetail !== null) {
            $data['pickupNotificationDetail'] = $this->pickupNotificationDetail->prepare();
        }

        return $data;
    }

    public function request() {
        parent::request();

        try {
            $query = $this->http_client->post($this->getApiUri($this->api_endpoint), [
                'json' => $this->prepare(),
                'http_errors' => FALSE,
            ]);
            return ($this->raw === true) ? $query : json_decode($query->getBody()->getContents());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function setAssociatedAccountNumber(string $associatedAccountNumber) : CreatePickup
    {
        $this->associatedAccountNumber = $associatedAccountNumber;

        return $this;
    }

    public function setOriginDetail(OriginDetail $originDetail) : CreatePickup
    {
        $this->originDetail = $originDetail;

        return $this;
    }

    public function setAssociatedAccountNumberType(?string $associatedAccountNumberType = null) : CreatePickup
    {
        $this->associatedAccountNumberType = $associatedAccountNumberType;

        return $this;
    }

    public function setTotalWeight(?Weight $totalWeight = null) : CreatePickup
    {
        $this->totalWeight = $totalWeight;

        return $this;
    }

    public function setPackageCount(?int $packageCount = null) : CreatePickup
    {
        $this->packageCount = $packageCount;

        return $this;
    }

    public function setCarrierCode(string $carrierCode) : CreatePickup
    {
        $this->carrierCode = $carrierCode;

        return $this;
    }

    public function setRemarks(?string $remarks = null) : CreatePickup
    {
        $this->remarks = $remarks;

        return $this;
    }

    public function setCountryRelationships(?string $countryRelationships = null) : CreatePickup
    {
        $this->countryRelationships = $countryRelationships;

        return $this;
    }

    public function setPickupType(?string $pickupType = null) : CreatePickup
    {
        $this->pickupType = $pickupType;

        return $this;
    }

    public function setTrackingNumber(?string $trackingNumber = null) : CreatePickup
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function setCommodityDescription(?string $commodityDescription = null) : CreatePickup
    {
        $this->commodityDescription = $commodityDescription;

        return $this;
    }

    public function setPickupNotificationDetail(?PickupNotificationDetail $pickupNotificationDetail = null) : CreatePickup
    {
        $this->pickupNotificationDetail = $pickupNotificationDetail;

        return $this;
    }
}
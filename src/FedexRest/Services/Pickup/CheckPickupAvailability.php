<?php

namespace FedexRest\Services\Pickup;

use FedexRest\Services\AbstractRequest;
use FedexRest\Entity\Address;
use FedexRest\Services\Pickup\Entity\ShipmentAttributes;

class CheckPickupAvailability extends AbstractRequest
{
    protected Address $pickupAddress;
    protected \DateTime $dispatchDate;
    protected \DateTime $packageReadyTime;
    protected \DateTime $customerCloseTime;
    protected ?string $pickupType = null;
    /** @var string[] $carries */
    protected array $pickupRequestType;
    protected ShipmentAttributes $shipmentAttributes;
    protected ?int $numberOfBusinessDays = null;
    protected string $associatedAccountNumber;
    protected ?string $associatedAccountNumberType = null;
    /** @var string[] $carries */
    protected array $carriers;
    protected string $countryRelationship;

    /**
     * {@inheritDoc}
     */
    public function setApiEndpoint() {
        return '/pickup/v1/pickups/availabilities';
    }

    public function prepare() : array {
        $data = [
            'pickupAddress' => $this->pickupAddress->prepare(),
            'dispatchDate' => $this->dispatchDate->format('Y-m-d'),
            'packageReadyTime' => $this->packageReadyTime->format('H:i:s'),
            'customerCloseTime' => $this->customerCloseTime->format('H:i:s'),
            'pickupRequestType' => $this->pickupRequestType,
            'shipmentAttributes' => $this->shipmentAttributes->prepare(),
            'associatedAccountNumber' => $this->associatedAccountNumber,
            'carriers' => $this->carriers,
            'countryRelationship' => $this->countryRelationship,  
        ];

        if ($this->associatedAccountNumberType !== null) {
            $data['associatedAccountNumberType'] = $this->associatedAccountNumberType;
        }

        if ($this->pickupType !== null) {
            $data['pickupType'] = $this->pickupType;
        }

        if ($this->numberOfBusinessDays !== null) {
            $data['numberOfBusinessDays'] = $this->numberOfBusinessDays;
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

    public function setAssociatedAccountNumber(string $associatedAccountNumber) : CheckPickupAvailability
    {
        $this->associatedAccountNumber = $associatedAccountNumber;

        return $this;
    }

    public function setAssociatedAccountNumberType(?string $associatedAccountNumberType = null) : CheckPickupAvailability
    {
        $this->associatedAccountNumberType = $associatedAccountNumberType;

        return $this;
    }

    public function setPickupType(?string $pickupType = null) : CheckPickupAvailability
    {
        $this->pickupType = $pickupType;

        return $this;
    }

    public function setDispatchDate(\DateTime $dispatchDate) : CheckPickupAvailability
    {
        $this->dispatchDate = $dispatchDate;

        return $this;
    }

    public function setPickupAddress(Address $pickupAddress) : CheckPickupAvailability
    {
        $this->pickupAddress = $pickupAddress;

        return $this;
    }

    public function setPackageReadyTime(\DateTime $packageReadyTime) : CheckPickupAvailability
    {
        $this->packageReadyTime = $packageReadyTime;

        return $this;
    }

    public function setCustomerCloseTime(\DateTime $customerCloseTime) : CheckPickupAvailability
    {
        $this->customerCloseTime = $customerCloseTime;

        return $this;
    }

    public function setPickupRequestType(string ...$pickupRequestType) : CheckPickupAvailability
    {
        $this->pickupRequestType = $pickupRequestType;

        return $this;
    }

    public function setShipmentAttributes(ShipmentAttributes $shipmentAttributes) : CheckPickupAvailability
    {
        $this->shipmentAttributes = $shipmentAttributes;

        return $this;
    }

    public function setNumberOfBusinessDays(int $numberOfBusinessDays) : CheckPickupAvailability
    {
        $this->numberOfBusinessDays = $numberOfBusinessDays;

        return $this;
    }

    public function setCarriers(string ...$carriers) : CheckPickupAvailability
    {
        $this->carriers = $carriers;

        return $this;
    }

    public function setCountryRelationship(string $countryRelationship) : CheckPickupAvailability
    {
        $this->countryRelationship = $countryRelationship;

        return $this;
    }
}
<?php

namespace FedexRest\Services\Pickup\Entity;

class PickupLocation
{
    protected Contact $contact;
    protected Address $address;
    protected ?string $accountNumber = null;
    protected ?string $deliveryInstructions = null;

    public function prepare() : array {
        $data = [];

        $data['contact'] = $this->contact->prepare();
        $data['address'] = $this->address->prepare();

        if ($this->accountNumber !== null) {
            $data['accountNumber'] = $this->accountNumber;
        }

        if ($this->deliveryInstructions !== null) {
            $data['deliveryInstructions'] = $this->deliveryInstructions;
        }

        return $data;
    }

    public function setContact(Contact $contact) : PickupLocation
    {
        $this->contact = $contact;

        return $this;
    }

    public function setAddress(Address $address) : PickupLocation
    {
        $this->address = $address;

        return $this;
    }

    public function setAccountNumber(?string $accountNumber = null) : PickupLocation
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function setDeliveryInstructions(?string $deliveryInstructions = null) : PickupLocation
    {
        $this->deliveryInstructions = $deliveryInstructions;

        return $this;
    }
}

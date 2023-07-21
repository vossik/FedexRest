<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;

class Payor
{
    public ?bool $isDocumentOnly = null;
    public ?DutiesPayment $dutiesPayment = null;
    public ?Commodities $commodities = null;

    /**
     * @param string  $paymentType
     * @return $this
     */
    public function withAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    public function setAccountNumber(int $accountNumber): Payor {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        
        if ($this->isDocumentOnly === true) {
            $data['isDocumentOnly'] = true;
        } else {
            $data['isDocumentOnly'] = false;
        }

        if ($this->dutiesPayment !== null) {
            $data['dutiesPayment'] = $this->dutiesPayment->prepare();
        }

        if ($this->commodities !== null) {
            $data['commodities'] = [$this->commodities->prepare()];
        }

        return $data;
    }
}

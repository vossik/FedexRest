<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;

class Payor
{
    public ?int $accountNumber;
    public ?Address $address = null;
    public string $phoneNumber;

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
        
        if ($this->phoneNumber!== null) {
            $data['contact']['phoneNumber'] = $this->phoneNumber;
        }

        if ($this->address !== null) {
            $data['address'] = $this->address->prepare();
        }

        if ($this->accountNumber !== null) {
            $data['accountNumber']['value'] = $this->accountNumber;
        }

        return $data;
    }
}

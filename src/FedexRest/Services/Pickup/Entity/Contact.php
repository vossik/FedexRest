<?php

namespace FedexRest\Services\Pickup\Entity;

class Contact
{
    protected ?string $companyName = null;
    protected ?string $personName = null;
    protected ?string $phoneNumber = null;
    protected ?string $phoneExtension = null;

    public function prepare() : array {
        $data = [];

        if ($this->companyName !== null) {
            $data['companyName'] = $this->companyName;
        }

        if ($this->personName !== null) {
            $data['personName'] = $this->personName;
        }

        if ($this->phoneNumber !== null) {
            $data['phoneNumber'] = $this->phoneNumber;
        }
        
        if ($this->phoneExtension !== null) {
            $data['phoneExtension'] = $this->phoneExtension;
        }
        
        return $data;
    }

    public function setCompanyName(?string $companyName = null) : Contact
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function setPersonName(?string $personName = null) : Contact
    {
        $this->personName = $personName;

        return $this;
    }

    public function setPhoneNumber(?string $phoneNumber = null) : Contact
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function setPhoneExtension(?string $phoneExtension = null) : Contact
    {
        $this->phoneExtension = $phoneExtension;

        return $this;
    }
}

<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;

class CustomsClearanceDetail
{
    public ?bool $isDocumentOnly = null;
    public ?DutiesPayment $dutiesPayment = null;
    public ?Commodities $commodities = null;

    /**
     * @param string  $paymentType
     * @return $this
     */
    public function setIsDocumentOnly(bool $isDocumentOnly) : CustomsClearanceDetail
    {
        $this->isDocumentOnly = $isDocumentOnly;
        return $this;
    }

    public function setDutiesPayment(DutiesPayment $dutiesPayment) : CustomsClearanceDetail {
        $this->dutiesPayment = $dutiesPayment;
        return $this;
    }

    public function setCommodities(Commodities $commodities) : CustomsClearanceDetail
    {
        $this->commodities = $commodities;
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

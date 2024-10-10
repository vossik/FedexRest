<?php

namespace FedexRest\Services\Ship\Entity;

class CustomsClearanceDetail
{
    public ?bool $isDocumentOnly = null;
    public ?DutiesPayment $dutiesPayment = null;
    /** @var Commodity[] $commodities */
    public ?array $commodities = null;

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

    public function setCommodities(Commodity ...$commodities) : CustomsClearanceDetail
    {
        $this->commodities = $commodities;

        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        
        $data['isDocumentOnly'] = $this->isDocumentOnly === true;

        if ($this->dutiesPayment !== null) {
            $data['dutiesPayment'] = $this->dutiesPayment->prepare();
        }

        if ($this->commodities !== null) {
            $commodities = [];

            foreach ($this->commodities as $commodity) {
                $commodities[] = $commodity->prepare();
            }

            $data['commodities'] = $commodities;
        }

        return $data;
    }
}

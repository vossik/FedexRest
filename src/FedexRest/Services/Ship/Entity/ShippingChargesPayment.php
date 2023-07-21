<?php

namespace FedexRest\Services\Ship\Entity;

class ShippingChargesPayment
{
    public ?string $paymentType;
    public ?Payor $payor;

    /**
     * @param string  $paymentType
     * @return $this
     */
    public function setPaymentType(string $paymentType): ShippingChargesPayment
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    public function setPayor(Payor $payor): ShippingChargesPayment {
        $this->payor = $payor;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->paymentType)) {
            $data['paymentType'] = $this->paymentType;
        }

        if ($this->payor !== null) {
            $data['payor']['responsibleParty'] = $this->payor->prepare();
        }

        return $data;
    }
}

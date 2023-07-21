<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;
use FedexRest\Services\Ship\Type\PaymentType;

class DutiesPayment
{
    public ?string $paymentType = null;
    public ?Payor $payor = null;

    public function setPaymentType(string $paymentType) : DutiesPayment
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function setPayor(Payor $payor) : DutiesPayment
    {
        $this->payor = $payor;

        return $this;
    }

    public function prepare(): array
    {
        $data = [];

        if ($this->paymentType !== null) {
            $data['paymentType'] = $this->paymentType;
        }

        if ($this->payor !== null) {
            $data['payor']['responsibleParty'] = $this->payor->prepare();
        }

        return $data;
    }
}

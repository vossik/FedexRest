<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;
use FedexRest\Services\Ship\Type\PaymentType;

class DutiesPayment
{
    public ?string $paymentType = null;

    public function setPaymentType(string $paymentType) : DutiesPayment
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function prepare(): array
    {
        $data = [];

        if ($this->paymentType !== null) {
            $data['paymentType'] = $this->paymentType;
        }

        return $data;
    }
}

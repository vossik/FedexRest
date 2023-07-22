<?php

namespace FedexRest\Services\Ship\Entity;

use FedexRest\Entity\Address;
use FedexRest\Entity\Dimensions;

class AdditionalMeasures
{
    /** @var AdditionalMeasure[] */
    public array $additionalMeasures;

    public function addAdditionalMeasure(AdditionalMeasure $additionalMeasure) : AdditionalMeasures
    {
        $this->additionalMeasures[] = $additionalMeasure;

        return $this;
    }

    public function prepare() : array
    {
        $data = [];

        foreach ($this->additionalMeasures as $additionalMeasure) {
            $data[] = $additionalMeasure->prepare();
        }

        return $data;
    }
}

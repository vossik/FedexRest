<?php

namespace FedexRest\Services\Pickup\Entity;

class EmailDetail
{
    protected string $adress;
    protected string $locale;

    public function prepare() : array {
        return [
            'adress' => $this->adress,
            'locale' => $this->locale,
        ];
    }

    public function setAdress(string $adress) : EmailDetail
    {
        $this->adress = $adress;

        return $this;
    }

    public function setLocale(string $locale) : EmailDetail
    {
        $this->locale = $locale;

        return $this;
    }
}

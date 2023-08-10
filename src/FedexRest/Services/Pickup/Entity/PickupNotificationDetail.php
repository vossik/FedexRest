<?php

namespace FedexRest\Services\Pickup\Entity;

class PickupNotificationDetail
{
    /** @var ?EmailDetail[] $emailDatail */
    protected ?array $emailDetails = null;
    protected ?string $format = null;
    protected ?string $userMessage = null;

    public function prepare() : array {
        $data = [];

        if ($this->emailDetails !== null) {
            $emailDetails = [];

            foreach ($this->emailDetails as $emailDetail) {
                $emailDetails[] = $emailDetail->prepare();
            }

            $data['emailDetails'] = $emailDetails;
        }

        if ($this->format !== null) {
            $data['format'] = $this->format;
        }

        if ($this->userMessage !== null) {
            $data['userMessage'] = $this->userMessage;
        }

        return $data;
    }

    public function setFormat(?string $format = null) : PickupNotificationDetail
    {
        $this->format = $format;

        return $this;
    }

    public function setUserMessage(?string $userMessage = null) : PickupNotificationDetail
    {
        $this->userMessage = $userMessage;

        return $this;
    }

    public function setEmailDetails(EmailDetail ...$emailDetails) : PickupNotificationDetail
    {
        $this->emailDetails = $emailDetails;

        return $this;
    }
}

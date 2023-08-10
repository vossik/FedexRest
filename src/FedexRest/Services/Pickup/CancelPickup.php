<?php

namespace FedexRest\Services\Pickup;

use FedexRest\Services\AbstractRequest;
use FedexRest\Services\Pickup\Entity\OriginDetail;
use FedexRest\Services\Pickup\Entity\PickupNotificationDetail;
use FedexRest\Services\Pickup\Entity\Weight;

class CancelPickup extends AbstractRequest
{
    protected string $associatedAccountNumber;
    protected string $pickupConfirmationCode;
    protected ?string $remarks = null;
    protected ?string $carrierCode = null;
    protected \DateTime $scheduledDate;

    /**
     * {@inheritDoc}
     */
    public function setApiEndpoint() {
        return '/pickup/v1/pickups/cancel';
    }

    public function prepare() : array {
        $data = [];

        $data['associatedAccountNumber']['value'] = $this->associatedAccountNumber;
        $data['pickupConfirmationCode'] = $this->pickupConfirmationCode;
        $data['scheduledDate'] = $this->scheduledDate->format('Y-m-d');

        if ($this->carrierCode !== null) {
            $data['carrierCode'] = $this->carrierCode;
        }

        if ($this->remarks !== null) {
            $data['remarks'] = $this->remarks;
        }

        return $data;
    }

    public function request() {
        parent::request();

        try {
            $query = $this->http_client->put($this->getApiUri($this->api_endpoint), [
                'json' => $this->prepare(),
                'http_errors' => FALSE,
            ]);
            return ($this->raw === true) ? $query : json_decode($query->getBody()->getContents());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function setAssociatedAccountNumber(string $associatedAccountNumber) : CancelPickup
    {
        $this->associatedAccountNumber = $associatedAccountNumber;

        return $this;
    }

    public function setCarrierCode(string $carrierCode) : CancelPickup
    {
        $this->carrierCode = $carrierCode;

        return $this;
    }

    public function setRemarks(?string $remarks = null) : CancelPickup
    {
        $this->remarks = $remarks;

        return $this;
    }

    public function setScheduledDate(\DateTime $scheduledDate) : CancelPickup
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    public function setPickupConfirmationCode(string $pickupConfirmationCode) : CancelPickup
    {
        $this->pickupConfirmationCode = $pickupConfirmationCode;

        return $this;
    }
}
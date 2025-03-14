<?php

namespace ComplyCube\Model;

use \stdClass;

class Check implements \JsonSerializable
{
    public ?string $id = null;
    public ?string $clientId = null;
    public ?bool $enableMonitoring = false;
    public ?string $documentId = null;
    public ?string $addressId = null;
    public ?string $livePhotoId = null;
    public ?string $liveVideoId = null;
    public ?string $entityName = null;
    public ?string $type = null;
    public ?CheckOptions $options = null;
    public ?string $status = null;
    public $result;
    protected $createdAt;
    protected $updatedAt;

    public function load(stdClass $response)
    {
        $this->id = $response->id;
        $this->clientId = $response->clientId;
        $this->enableMonitoring = isset($response->enableMonitoring) ?  $response->enableMonitoring : null;
        $this->documentId = isset($response->documentId) ?  $response->documentId : null;
        $this->addressId = isset($response->addressId) ?  $response->addressId : null;
        $this->livePhotoId = isset($response->livePhotoId) ?  $response->livePhotoId : null;
        $this->liveVideoId = isset($response->liveVideoId) ?  $response->liveVideoId : null;
        $this->entityName = $response->entityName;
        $this->type = $response->type;
        $this->status = isset($response->status) ?  $response->status : null;
        $this->result = isset($response->result) ?  $response->result : null;
        $this->createdAt = isset($response->createdAt) ? $response->createdAt : null;
        $this->updatedAt = isset($response->updatedAt) ? $response->updatedAt : null;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'id' => $this->id,
            'clientId' => $this->clientId,
            'enableMonitoring' => $this->enableMonitoring,
            'documentId' => $this->documentId,
            'addressId' => $this->addressId,
            'livePhotoId' => $this->livePhotoId,
            'liveVideoId' => $this->liveVideoId,
            'entityName' => $this->entityName,
            'options' => $this->options,
            'type' => $this->type,
            'status' => $this->status,
            'result' => $this->result,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt
        ], function ($value) {
            return ($value !== null);
        });
    }
}

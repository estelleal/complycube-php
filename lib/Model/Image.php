<?php

namespace ComplyCube\Model;

use \stdClass;

class Image implements \JsonSerializable
{
    public $id = null;
    public $clientId = null;
    public $fileName = null;
    public $documentSide = null;
    public $downloadLink = null;
    public $contentType = null;
    public $data = null;
    public $size = null;
    protected $createdAt;
    protected $updatedAt;

    public function load(stdClass $response)
    {
        $this->id = isset($response->id) ? $response->id : null;
        $this->clientId = isset($response->clientId) ? $response->clientId : null;
        $this->fileName = isset($response->fileName) ? $response->fileName : null;
        $this->documentSide = isset($response->documentSide) ? $response->documentSide : null;
        $this->downloadLink = isset($response->downloadLink) ? $response->downloadLink : null;
        $this->contentType = $response->contentType;
        $this->size =  isset($response->size) ? $response->size : null;
        $this->data = isset($response->data) ? $response->data : null;
        $this->createdAt = isset($response->createdAt) ? $response->createdAt : null;
        $this->updatedAt = isset($response->updatedAt) ? $response->updatedAt : null;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'id' => $this->id,
            'clientId' => $this->clientId,
            'fileName' => $this->fileName,
            'documentSide' => $this->documentSide,
            'downloadLink' => $this->downloadLink,
            'contentType' => $this->contentType,
            'data' => $this->data,
            'size' => $this->size,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt
        ], function ($value) {
            return ($value !== null);
        });
    }
}

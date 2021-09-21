<?php

namespace ComplyCube\Model;

use \stdClass;

class RiskProfile implements \JsonSerializable
{
    public $overall = null;
    public $countryRisk = null;
    public $politicalExposureRisk = null;
    public $occupationRisk = null;
    public $watchlistRisk = null;

    public function load(stdClass $response)
    {
        $this->overall = $response->overall;
        $this->countryRisk = new CountryRisk($response->countryRisk);
        $this->politicalExposureRisk = new PoliticalExposureRisk($response->politicalExposureRisk);
        $this->occupationRisk = new OccupationRisk($response->occupationRisk);
        $this->watchlistRisk = new WatchlistRisk($response->watchlistRisk);
    }

    public function jsonSerialize()
    {
        return array_filter([
            'overall' => $this->overall,
            'countryRisk' => $this->countryRisk,
            'politicalExposureRisk' => $this->politicalExposureRisk,
            'occupationRisk' => $this->occupationRisk,
            'watchlistRisk' => $this->watchlistRisk,
        ], function ($value) {
            return ($value !== null);
        });
    }
}

class CountryRisk implements \JsonSerializable
{
    public $risk = null;
    public $country = null;
    public $breakdown = null;

    public function __construct($response)
    {
        $this->risk = $response->risk;
        $this->country = isset($response->country) ? $response->country : null;
        $this->breakdown = isset($response->breakdown) ? $response->breakdown : null;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'risk' => $this->risk,
            'country' => $this->country,
            'breakdown' => $this->breakdown
        ]);
    }
}

class PoliticalExposureRisk implements \JsonSerializable
{
    public $risk;
    public $checkId;

    public function __construct($response)
    {
        $this->risk = $response->risk;
        $this->checkId = isset($response->checkId) ? $response->checkId : null;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'risk' => $this->risk,
            'checkId' => $this->checkId
        ]);
    }
}

class OccupationRisk implements \JsonSerializable
{
    public $risk;
    public $checkId;
    public $occupationCategory;
    public $occupationTitle;

    public function __construct($response)
    {
        $this->risk = $response->risk;
        $this->checkId = isset($response->checkId) ? $response->checkId : null;
        $this->occupationCategory = isset($response->occupationCategory) ? $response->occupationCategory : null;
        $this->occupationTitle = isset($response->occupationTitle) ? $response->occupationTitle : null;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'risk' => $this->risk,
            'checkId' => $this->checkId,
            'occupationCategory' => $this->occupationCategory,
            'occupationTitle' => $this->occupationTitle
        ]);
    }
}

class WatchlistRisk implements \JsonSerializable
{
    public $risk;
    public $checkId;

    public function __construct($response)
    {
        $this->risk = $response->risk;
        $this->checkId = isset($response->checkId) ? $response->checkId : null;
    }

    public function jsonSerialize()
    {
        return array_filter([
            'risk' => $this->risk,
            'checkId' => $this->checkId
        ], function ($value) {
            return ($value !== null);
        });
    }
}

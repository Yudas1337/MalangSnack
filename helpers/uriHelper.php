<?php

/**
 * Define setter & getter for site base url
 *
 * @return string
 */

class uriHelper
{
    private $base_url = "http://localhost/web/";

    public function baseUrl(string $url = NULL): string
    {
        return $this->base_url . $url;
    }

    public function getBaseUrl(): string
    {
        return $this->base_url;
    }

    public function assetUrl(string $url = NULL): string
    {
        return $this->base_url . "assets/" . $url;
    }
}

$uriHelper = new uriHelper();

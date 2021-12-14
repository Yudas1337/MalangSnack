<?php

/**
 * Define setter & getter for site base url
 *
 * @return string
 */

class uriHelper
{
    private $base_url = "http://localhost/web/";

    public function baseUrl($url = NULL): string
    {
        return $this->base_url . $url;
    }

    public function getBaseUrl(): string
    {
        return $this->base_url;
    }
}

$uriHelper = new uriHelper();

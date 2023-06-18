<?php
namespace App\api;

/**
 * Data for CURL
 * Need refactoring to PSR-7
 */
class dataClass implements dataClassInterface
{
    private $headers = null;
    private $payload = null;
    private $url = null;
    
    
    public function getHeaders() 
    {
        return $this->headers;
    }

    public function getPayload() 
    {
        return json_encode($this->payload);
    }

    public function getUrl() 
    {
        return $this->url;
    }

    public function setHeaders($headers): void 
    {
        $this->headers = $headers;
    }

    public function setPayload($payload): void 
    {
        $this->payload = $payload;
    }

    public function setUrl($url): void 
    {
        $this->url = $url;
    }


    
    
}

<?php
namespace App\api;

interface dataClassInterface 
{
    public function getHeaders();
    public function getPayload();
    public function getUrl();

    public function setHeaders($headers);

    public function setPayload($payload);

    public function setUrl($url);
    
}

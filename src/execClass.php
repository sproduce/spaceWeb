<?php
namespace App\api;

/**
 * CURL exec request
 */
class execClass implements execClassInterface
{
    
    public function execute(dataClassInterface $dataObj)
    {
        $curlH = curl_init(); 
        curl_setopt($curlH, CURLOPT_POST, 1);
        curl_setopt($curlH, CURLOPT_RETURNTRANSFER, true);
        if (!$dataObj->getHeaders()){
            throw new \Exception('execClass: Header not set');
        }
        curl_setopt($curlH, CURLOPT_HTTPHEADER, $dataObj->getHeaders());
        if (!$dataObj->getUrl()){
             throw new \Exception('execClass: Url not set');
        }
        curl_setopt($curlH, CURLOPT_URL, $dataObj->getUrl());
        if (!$dataObj->getPayload()){
             throw new \Exception('execClass: Payload jsonrpc2 not set');
        }
        curl_setopt($curlH, CURLOPT_POSTFIELDS, $dataObj->getPayload());
        $result = curl_exec($curlH);
        curl_close($curlH);
        return $result;
    }
    
    
    
}

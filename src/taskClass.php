<?php
namespace App\api;


/**
 * Main API Class
 */
class taskClass {
    
    private $token = null;
    private $execObj;
    
    function __construct(execClassInterface $execObj)
    {
        $this->execObj = $execObj;
    }
    
    
    
    /**
    * getAuth token store in object
    * @param string $login User login
    * @param string $password User password
    * @return string Auth token
    */
    public function getToken(string $login, string $password): string
    {
        $dataObj = new dataClass();
        $dataObj->setUrl('https://api.sweb.ru/notAuthorized');
        $dataObj->setHeaders(['Content-Type: application/json; charset=utf-8', 'Accept: application/json']);
        $dataObj->setPayload([
            'jsonrpc' => '2.0',
            'method' => 'getToken',
            'params' => [
                'login' => $login,
                'password' => $password,
            ],
            'id' => null,
        ]);
        
        $response = $this->execObj->execute($dataObj);
        $responseArray = json_decode($response, true);
        if (isset($responseArray['result'])){
            $this->token = $responseArray['result'];
        } else {
            throw new \Exception($response);
        }
        return $this->token;
    }
    
    
    /**
     * add domain to account
     * @param string $domain domain
     * @param string $prolongType type
     * @param bool $dir dir info
     * @return (int|obj) Auth token
    */
    
    public function move(string $domain, string $prolongType, bool $dir = null)
    {
        if ($this->token){
            $dataObj = new dataClass();
            $dataObj->setUrl('https://api.sweb.ru/domains');
            $dataObj->setHeaders([
                'Content-Type: application/json; charset=utf-8',
                'Accept: application/json',
                "Authorization: Bearer $this->token",
            ]);
            $dataObj->setPayload([
                'jsonrpc' => '2.0',
                'method' => 'add',
                'params' => [
                    'domain' => $domain,
                ],
                'id' => null,
            ]);
            
            $response = $this->execObj->execute($dataObj);
            $responseArray = json_decode($response, true);
        
            if (isset($responseArray['result'])){
                return 1;
            }
            else {
                throw new \Exception($response);
            }
        } else {
            throw new \Exception("taskClass method move() Need Token");
        }
    }

}

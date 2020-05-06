<?php
require_once('curl_helper.php');

class SharedcountApi
{
    private $apiToken;
    private $url;
    const DOMAIN = 'sharedcount.com';
    function __construct($apiToken, $subDomain = 'api')
    {
        $this->setApiToken($apiToken);
        $this->setSubDomain($subDomain);
    }
    function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }
    function setSubDomain($subDomain)
    {
        $this->url = "https://" . $subDomain . "." . self::DOMAIN . "/v1.0";
    }
    function get($urlToCheck)
    {
        $response = CurlHelper::curlGet($this->url . "?apikey=" . $this->apiToken . "&url=" . $urlToCheck);
        return $response;
    }
    function quota()
    {
        $response = CurlHelper::curlGet($this->url . "/quota?apikey=" . $this->apiToken);
        return $response;
    }
    function usage()
    {
        $response = CurlHelper::curlGet($this->url . "/usage?apikey=" . $this->apiToken);
        return $response;
    }
    function getWhiteListedDomains()
    {
        $response = CurlHelper::curlGet($this->url . "/domain_whitelist?apikey=" . $this->apiToken);
        return $response;
    }
    function status()
    {
        $response = CurlHelper::curlGet($this->url . "/status");
        return $response;
    }
    function bulkPost($urlArray)
    {
        $urlArray = implode("\n", $urlArray);
        $response = CurlHelper::curlPost($this->url . "/bulk?apikey=" . $this->apiToken, $urlArray);
        return $response;
    }
    function bulkGet($bulkId)
    {
        $response = CurlHelper::curlGet($this->url . "/bulk?apikey=" . $this->apiToken . "&bulk_id=" . $bulkId);
        return $response;
    }
}

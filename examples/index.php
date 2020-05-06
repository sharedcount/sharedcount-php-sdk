<?php

require_once('api.php');
$sharedcountApiInstance = new SharedcountApi('YOUR_API_KEY');

//Return share counts for a URL.
$urlGetResponse = $sharedcountApiInstance->bulkGet($url);

//Post a large number of URLs all at once to calculate bulk social counts.
//Get bulk_id from bulk post response, then using bulkGet to get result
$urls = array('url1', 'url2');

$bulkPostResponse = $sharedcountApiInstance->bulkPost($urls);

$bulkId = $bulkPostResponse['bulk_id'];

$bulkResponse = $sharedcountApiInstance->bulkGet($bulkId);

//Return historical quota usage information.
$usage = $sharedcountApiInstance->usage();

//Return information about your quota allocation for the day.
$quota = $sharedcountApiInstance->quota();

//Return a list of domains added to your domain whitelist, and whether the domain whitelist is currently being enforced.
$domainWhiteList = $sharedcountApiInstance->getWhiteListedDomains();

//Check to see if the SharedCount API is currently up.
$status = $sharedcountApiInstance->status();

<?php

include __DIR__ . "/../vendor/autoload.php";

use j4p\Kayakel\Kayakel;
use j4p\Kayakel\KyTicket;


$url = "http://www.universaldesk.com/support/api/";
$apiKey = "bc378deb-c04e-61a4-e160-2a1b299006e4";
$secretKey = "Y2RjOWFmN2QtZGI2MS00ZGY0LTI1YTQtYzY1MDYwODg4ZjU5ZDM4YjdhNDItMDZhYS02Nzk0LWI5MjUtNzU1ZjkyZWU5NWY1";

#create a Kayakel obj
$ky = new Kayakel($url,$apiKey,$secretKey);
#set type of output
$ky->setTypeOutput('array');

$KyTicket = new KyTicket($ky);
#list of all ticket of department 12 with status 4
//var_dump($KyTicket->listAll(12,4));
#find the ticket 246295
#var_dump($KyTicket->findTicket("246295"));

<?php

include __DIR__ . "/../vendor/autoload.php";

use j4p\Kayakel\Kayakel;
use j4p\Kayakel\KyTicket;


$url = "<URL>";
$apiKey = "<API KEY>";
$secret = "<SECRET>";

#create a Kayakel obj
$ky = new Kayakel($url,$apiKey,$secretKey);
#set type of output
$ky->setTypeOutput('array');

$KyTicket = new KyTicket($ky);
#list of all ticket of department 12 with status 4
//var_dump($KyTicket->listAll(12,4));
#find the ticket 246295
#var_dump($KyTicket->findTicket("246295"));

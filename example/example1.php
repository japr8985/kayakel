<?php

include __DIR__ . "/../vendor/autoload.php";

use j4p\Kayakel\KyTicket;


$ky = new KyTicket("<URL>","<API key>","<API secret>");

//create a ticket
$ky->createTicket([
            "fullname" => $request->name,
            "email" => $request->email,
            "subject" => "From EasyWp - b2020 -".$request->subject,
            "contents" => $request->msj,
            "departmentid" => $request->departament,
            "ticketpriorityid" => $request->priority,
            "tickettypeid" => 4,
            "ticketstatusid" => 4,
            "autouserid" => 1
        ]);

//delete a ticket
$ky->deleteTicket("1234");

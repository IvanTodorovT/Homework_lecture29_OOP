<?php

require_once 'autoload.php';


$caller = new GSM('Nokia');
$receiver = new GSM('Sony');

$caller->setSimMobileNumber(0888888888);
$receiver->setSimMobileNumber(0887654321);

$caller->sethasSimCard(true);
$receiver->sethasSimCard(true);

//$duration->setDuration(25);

$call1 = new Call($caller, $receiver, 200);

//echo $caller->getSumForCall();


echo $caller->getSimMobileNumber();
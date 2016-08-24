<?php
require_once 'autoload.php';

$gsm1 = new GSM ( 'Nokia' );
$gsm2 = new GSM ( 'Sony' );

$gsm1->insertSimCard ( '0888888821' );
$gsm2->insertSimCard ( '0888888888' );

$gsm1->call ( $gsm2, 110 );

echo $gsm1->getSumForCall () . PHP_EOL;

echo $gsm1->printInfoForTheLastOutgoingCall () . PHP_EOL;
echo $gsm1->printInfoForTheLastIncomingCall () . PHP_EOL;


  
/* $gsm2->call($gsm1, 23);
echo $gsm2->printInfoForTheLastOutgoingCall().PHP_EOL;
echo $gsm2->printInfoForTheLastIncomingCall().PHP_EOL;  */


<?php
require_once 'autoload.php';

$rabotnik = new Employee ( "Ivan" );

$rabotnik->setHoursLeft ( 10 );

$rabotnik->work ();
//task- polivane, 3 chasa
echo $rabotnik->showReport () . PHP_EOL;


/* 
 	$rabotnik2 = new Employee("Milcho");
    $rabotnik2->setHoursLeft(2);

$rabotnik2->work();

echo $rabotnik2->showReport();

 */
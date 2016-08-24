<?php

use Task\Task;
use Employee\Employee;
require_once 'autoload.php';

$polivane = new Task("polivane", 3);

$rabotnik = new Employee ( "Ivan" );

$rabotnik->setCurrentTask($polivane);

$rabotnik->setHoursLeft(8);

$rabotnik->work ();

echo $rabotnik->showReport () . PHP_EOL;









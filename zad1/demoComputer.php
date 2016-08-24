<?php

require_once 'autoload.php';

$computer1 = new Computer(2014, 100, "Yes", 250, 200, "Windows");
$computer1->useMemory(100);

$computer2 = new Computer(2016, 900,"No", 500, 300, "Linux");
$computer2->changeOperationSystem("MacOs");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inheritance Demo</title>
	</head>
	<body>
		<h3><?= $computer1->getInfo() ?></h3>
	<br>
	<br>
	<h3><?= $computer2->getInfo() ?></h3>
	</body>
</html>
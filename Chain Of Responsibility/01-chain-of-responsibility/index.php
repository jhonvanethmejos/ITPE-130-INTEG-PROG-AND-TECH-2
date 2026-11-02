<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Chain of Responsibility - Student Request Processing</h2>";
$request = new StudentRequest("Transcript of Records");

echo "Request: {$request->type}<br><br>";

$studentAffairs = new StudentAffairsHandler();
$registrar = new RegistrarHandler();
$finance = new FinanceHandler();
$ict = new ICTHandler();

$studentAffairs->setNext($registrar)->setNext($finance)->setNext($ict);
$studentAffairs->handle($request);

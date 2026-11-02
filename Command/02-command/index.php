<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Command - Student System Actions</h2>";
$system = new StudentSystem();
$invoker = new Invoker();

$invoker->run(new EnrollCommand($system), "Enroll Student");
$invoker->run(new DropSubjectCommand($system), "Drop Subject");
$invoker->undoLast();

<?php
require_once __DIR__ . "/classes.php";

echo "<h2>State - Student Enrollment Status</h2>";
$student = new Student(new ApplicantState());
$student->showState();
$student->enroll();

echo "<br>Changing state to Pre-Assessed...<br>";
$student->setState(new PreAssessedState());
$student->showState();
$student->enroll();
$student->showState();

<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Template Method - Student Report Generation</h2>";
$report = new StudentReport();
$report->generateReport();

echo "<br>";
$gradeReport = new GradeReport();
$gradeReport->generateReport();

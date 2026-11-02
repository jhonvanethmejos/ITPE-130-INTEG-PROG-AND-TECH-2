<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Observer - Grade Notification System</h2>";
$gradeSystem = new GradeSystem();
$gradeSystem->attach(new StudentPortal());
$gradeSystem->attach(new EmailNotification());
$gradeSystem->attach(new ParentNotification());

$gradeSystem->setGrade(1.75);

<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Iterator - Student Record Collection</h2>";
$students = new StudentCollection();
$students->add(new Student("2026-001", "Juan"));
$students->add(new Student("2026-002", "Maria"));
$students->add(new Student("2026-003", "Pedro"));

echo "<strong>Student List</strong><br>";
foreach ($students as $student) {
    echo $student->getStudentId() . " - " . $student->getName() . "<br>";
}

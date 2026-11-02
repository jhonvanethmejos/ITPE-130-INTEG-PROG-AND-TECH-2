<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Interpreter - Student Search</h2>";
$student = new StudentContext("BSIT", 4);

$bsit = new TerminalExpression("PROGRAM", "BSIT");
$fourthYear = new TerminalExpression("YEAR", 4);
$bsitOrBscs = new OrExpression(
    new TerminalExpression("PROGRAM", "BSIT"),
    new TerminalExpression("PROGRAM", "BSCS")
);

$andQuery = new AndExpression($bsit, $fourthYear);

echo 'Expression: PROGRAM = "BSIT" AND YEAR = 4<br>';
echo "Result: " . ($andQuery->interpret($student) ? "TRUE" : "FALSE") . "<br><br>";

echo 'Expression: PROGRAM = "BSIT" OR PROGRAM = "BSCS"<br>';
echo "Result: " . ($bsitOrBscs->interpret($student) ? "TRUE" : "FALSE") . "<br>";

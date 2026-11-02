<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Strategy - Grade Calculation System</h2>";
$scores = [85, 90, 92];
$calculator = new GradeCalculator(new SimpleAverageStrategy());

echo "Strategy: Simple Average<br>";
echo "Result: " . number_format($calculator->calculate($scores), 2) . "<br><br>";

$calculator->setStrategy(new WeightedAverageStrategy());
echo "Strategy: Weighted Average (Quiz 20%, Exam 40%, Project 40%)<br>";
echo "Result: " . number_format($calculator->calculate($scores), 2) . "<br><br>";

$calculator->setStrategy(new TransmutedGradeStrategy());
echo "Strategy: Transmuted Grade<br>";
echo "Result: " . number_format($calculator->calculate($scores), 2) . "<br>";

<?php
require_once __DIR__ . "/classes.php";

echo "<h2>Visitor - Student Record Operations</h2>";
$records = [
    new Student("Juan"),
    new Faculty("Ms. Santos"),
    new Alumni("Maria")
];

echo "<strong>CSV Export Visitor</strong><br>";
$csvVisitor = new CSVExportVisitor();
foreach ($records as $record) { $record->accept($csvVisitor); }

echo "<br><strong>PDF Report Visitor</strong><br>";
$pdfVisitor = new PDFReportVisitor();
foreach ($records as $record) { $record->accept($pdfVisitor); }

<?php
declare(strict_types=1);

interface Visitor {
    public function visitStudent(Student $student): void;
    public function visitFaculty(Faculty $faculty): void;
    public function visitAlumni(Alumni $alumni): void;
}
interface Element {
    public function accept(Visitor $visitor): void;
}
class Student implements Element {
    public function __construct(public string $name) {}
    public function accept(Visitor $visitor): void { $visitor->visitStudent($this); }
}
class Faculty implements Element {
    public function __construct(public string $name) {}
    public function accept(Visitor $visitor): void { $visitor->visitFaculty($this); }
}
class Alumni implements Element {
    public function __construct(public string $name) {}
    public function accept(Visitor $visitor): void { $visitor->visitAlumni($this); }
}
class CSVExportVisitor implements Visitor {
    public function visitStudent(Student $student): void { echo "Student {$student->name} exported.<br>"; }
    public function visitFaculty(Faculty $faculty): void { echo "Faculty {$faculty->name} exported.<br>"; }
    public function visitAlumni(Alumni $alumni): void { echo "Alumni {$alumni->name} exported.<br>"; }
}
class ReportVisitor implements Visitor {
    public function visitStudent(Student $student): void { echo "Student report generated for {$student->name}.<br>"; }
    public function visitFaculty(Faculty $faculty): void { echo "Faculty report generated for {$faculty->name}.<br>"; }
    public function visitAlumni(Alumni $alumni): void { echo "Alumni report generated for {$alumni->name}.<br>"; }
}
class StatisticsVisitor implements Visitor {
    public function visitStudent(Student $student): void { echo "Student record counted: {$student->name}.<br>"; }
    public function visitFaculty(Faculty $faculty): void { echo "Faculty record counted: {$faculty->name}.<br>"; }
    public function visitAlumni(Alumni $alumni): void { echo "Alumni record counted: {$alumni->name}.<br>"; }
}
class PDFReportVisitor implements Visitor {
    public function visitStudent(Student $student): void { echo "PDF report prepared for student {$student->name}.<br>"; }
    public function visitFaculty(Faculty $faculty): void { echo "PDF report prepared for faculty {$faculty->name}.<br>"; }
    public function visitAlumni(Alumni $alumni): void { echo "PDF report prepared for alumnus/alumna {$alumni->name}.<br>"; }
}

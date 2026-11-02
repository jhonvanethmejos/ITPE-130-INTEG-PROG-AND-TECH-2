<?php
declare(strict_types=1);

abstract class Report {
    final public function generateReport(): void {
        $this->generateHeader();
        $this->retrieveData();
        $this->formatData();
        $this->generateFooter();
    }
    protected function generateHeader(): void {
        echo "========================<br>" . strtoupper($this->getTitle()) . "<br>========================<br>";
    }
    abstract protected function getTitle(): string;
    abstract protected function retrieveData(): void;
    abstract protected function formatData(): void;
    protected function generateFooter(): void { echo "========================<br>END OF REPORT<br>========================<br>"; }
}
class StudentReport extends Report {
    protected function getTitle(): string { return "Student Report"; }
    protected function retrieveData(): void { echo "Retrieving student information...<br>"; }
    protected function formatData(): void {
        echo "Student ID: 2026-001<br>Name: Juan Dela Cruz<br>Program: BSIT<br>";
    }
}
class GradeReport extends Report {
    protected function getTitle(): string { return "Grade Report"; }
    protected function retrieveData(): void { echo "Retrieving grade information...<br>"; }
    protected function formatData(): void { echo "Subject: Programming<br>Grade: 1.75<br>"; }
}
class EnrollmentReport extends Report {
    protected function getTitle(): string { return "Enrollment Report"; }
    protected function retrieveData(): void { echo "Retrieving enrollment information...<br>"; }
    protected function formatData(): void { echo "Student: Juan Dela Cruz<br>Status: Enrolled<br>"; }
}

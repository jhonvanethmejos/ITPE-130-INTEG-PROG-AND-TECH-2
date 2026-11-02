<?php
declare(strict_types=1);

interface EnrollmentState {
    public function enroll(Student $student): void;
    public function getName(): string;
}
class ApplicantState implements EnrollmentState {
    public function enroll(Student $student): void {
        echo "Student must complete pre-assessment first.<br>";
    }
    public function getName(): string { return "Applicant"; }
}
class PreAssessedState implements EnrollmentState {
    public function enroll(Student $student): void {
        echo "Student successfully enrolled.<br>";
        $student->setState(new EnrolledState());
    }
    public function getName(): string { return "Pre-Assessed"; }
}
class EnrolledState implements EnrollmentState {
    public function enroll(Student $student): void { echo "Student is already enrolled.<br>"; }
    public function getName(): string { return "Enrolled"; }
}
class DroppedState implements EnrollmentState {
    public function enroll(Student $student): void { echo "Dropped student must contact the registrar.<br>"; }
    public function getName(): string { return "Dropped"; }
}
class GraduatedState implements EnrollmentState {
    public function enroll(Student $student): void { echo "Student has already graduated.<br>"; }
    public function getName(): string { return "Graduated"; }
}
class Student {
    public function __construct(private EnrollmentState $state) {}
    public function setState(EnrollmentState $state): void { $this->state = $state; }
    public function showState(): void { echo "Current State: " . $this->state->getName() . "<br>"; }
    public function enroll(): void { echo "Action: Enroll<br>Result: "; $this->state->enroll($this); }
}

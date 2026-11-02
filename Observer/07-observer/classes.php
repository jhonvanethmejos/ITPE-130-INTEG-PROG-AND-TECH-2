<?php
declare(strict_types=1);

interface Observer {
    public function update(float $grade): void;
}
interface Subject {
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}

class GradeSystem implements Subject {
    private array $observers = [];
    private float $grade = 0.0;

    public function attach(Observer $observer): void { $this->observers[] = $observer; }
    public function detach(Observer $observer): void {
        $this->observers = array_filter($this->observers, fn($item) => $item !== $observer);
    }
    public function setGrade(float $grade): void {
        $this->grade = $grade;
        echo "Grade updated: " . number_format($grade, 2) . "<br><br>";
        $this->notify();
    }
    public function notify(): void {
        foreach ($this->observers as $observer) { $observer->update($this->grade); }
    }
}
class StudentPortal implements Observer {
    public function update(float $grade): void { echo "Student Portal: New grade posted ({$grade}).<br>"; }
}
class EmailNotification implements Observer {
    public function update(float $grade): void { echo "Email Notification: Your grade has been updated to {$grade}.<br>"; }
}
class ParentNotification implements Observer {
    public function update(float $grade): void { echo "Parent Notification: Student grade {$grade} has been posted.<br>"; }
}

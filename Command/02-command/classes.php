<?php
declare(strict_types=1);

interface Command {
    public function execute(): void;
    public function undo(): void;
}

class StudentSystem {
    private bool $enrolled = false;
    private bool $subjectDropped = false;

    public function enroll(): void {
        $this->enrolled = true;
        echo "Student successfully enrolled.<br>";
    }
    public function undoEnroll(): void {
        $this->enrolled = false;
        echo "Enrollment action undone.<br>";
    }
    public function dropSubject(): void {
        $this->subjectDropped = true;
        echo "Subject successfully dropped.<br>";
    }
    public function undoDropSubject(): void {
        $this->subjectDropped = false;
        echo "Drop subject action undone.<br>";
    }
    public function printRegistration(): void {
        echo "Registration form printed.<br>";
    }
    public function logout(): void {
        echo "Student logged out.<br>";
    }
}

class EnrollCommand implements Command {
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->enroll(); }
    public function undo(): void { $this->system->undoEnroll(); }
}
class DropSubjectCommand implements Command {
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->dropSubject(); }
    public function undo(): void { $this->system->undoDropSubject(); }
}
class PrintRegistrationCommand implements Command {
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->printRegistration(); }
    public function undo(): void { echo "Print action cannot be reversed.<br>"; }
}
class LogoutCommand implements Command {
    public function __construct(private StudentSystem $system) {}
    public function execute(): void { $this->system->logout(); }
    public function undo(): void { echo "Logout cannot be reversed in this demo.<br>"; }
}

class Invoker {
    private array $history = [];
    public function run(Command $command, string $label): void {
        echo "Executing: {$label}<br>";
        $command->execute();
        $this->history[] = $command;
    }
    public function undoLast(): void {
        $command = array_pop($this->history);
        if ($command === null) {
            echo "Nothing to undo.<br>";
            return;
        }
        echo "Undoing last command:<br>";
        $command->undo();
    }
}

<?php
declare(strict_types=1);

interface Mediator {
    public function send(string $message, Student $sender): void;
    public function register(Student $student): void;
}

class Student {
    public function __construct(private string $name, private Mediator $mediator) {}
    public function getName(): string { return $this->name; }
    public function sendMessage(string $message): void {
        echo $this->name . ": " . $message . "<br>";
        $this->mediator->send($message, $this);
    }
    public function receive(string $message, string $senderName): void {
        echo $this->name . " receives:<br>";
        echo $senderName . ": " . $message . "<br><br>";
    }
}

class ChatMediator implements Mediator {
    private array $students = [];
    public function register(Student $student): void { $this->students[] = $student; }
    public function send(string $message, Student $sender): void {
        foreach ($this->students as $student) {
            if ($student !== $sender) {
                $student->receive($message, $sender->getName());
            }
        }
    }
}

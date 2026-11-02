<?php
declare(strict_types=1);

class StudentProfileMemento {
    public function __construct(
        public string $name,
        public string $program,
        public int $year,
        public string $email
    ) {}
}

class StudentProfile {
    public function __construct(
        private string $name,
        private string $program,
        private int $year,
        private string $email
    ) {}

    public function save(): StudentProfileMemento {
        return new StudentProfileMemento($this->name, $this->program, $this->year, $this->email);
    }
    public function restore(StudentProfileMemento $memento): void {
        $this->name = $memento->name;
        $this->program = $memento->program;
        $this->year = $memento->year;
        $this->email = $memento->email;
    }
    public function update(string $program, int $year): void {
        $this->program = $program;
        $this->year = $year;
    }
    public function display(): void {
        echo "Name: {$this->name}<br>Program: {$this->program}<br>Year: {$this->year}<br>Email: {$this->email}<br>";
    }
}

class ProfileHistory {
    private array $history = [];
    public function save(StudentProfileMemento $memento): void { $this->history[] = $memento; }
    public function undo(): ?StudentProfileMemento { return array_pop($this->history); }
}

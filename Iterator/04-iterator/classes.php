<?php
declare(strict_types=1);

class Student {
    public function __construct(private string $studentId, private string $name) {}
    public function getStudentId(): string { return $this->studentId; }
    public function getName(): string { return $this->name; }
}

class StudentCollection implements IteratorAggregate {
    private array $students = [];

    public function add(Student $student): void {
        $this->students[] = $student;
    }

    public function getIterator(): Traversable {
        return new ArrayIterator($this->students);
    }
}

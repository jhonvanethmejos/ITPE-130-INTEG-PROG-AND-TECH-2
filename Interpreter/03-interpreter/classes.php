<?php
declare(strict_types=1);

class StudentContext {
    public function __construct(public string $program, public int $year) {}
}

interface Expression {
    public function interpret(StudentContext $student): bool;
}

class TerminalExpression implements Expression {
    public function __construct(private string $field, private string|int $value) {}
    public function interpret(StudentContext $student): bool {
        return match (strtoupper($this->field)) {
            "PROGRAM" => strtoupper($student->program) === strtoupper((string)$this->value),
            "YEAR" => $student->year === (int)$this->value,
            default => false
        };
    }
}

class AndExpression implements Expression {
    public function __construct(private Expression $left, private Expression $right) {}
    public function interpret(StudentContext $student): bool {
        return $this->left->interpret($student) && $this->right->interpret($student);
    }
}
class OrExpression implements Expression {
    public function __construct(private Expression $left, private Expression $right) {}
    public function interpret(StudentContext $student): bool {
        return $this->left->interpret($student) || $this->right->interpret($student);
    }
}

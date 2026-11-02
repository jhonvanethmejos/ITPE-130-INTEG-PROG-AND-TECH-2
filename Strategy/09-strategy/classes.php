<?php
declare(strict_types=1);

interface GradeStrategy {
    public function calculate(array $scores): float;
}
class SimpleAverageStrategy implements GradeStrategy {
    public function calculate(array $scores): float {
        if (count($scores) === 0) return 0.0;
        return array_sum($scores) / count($scores);
    }
}
class WeightedAverageStrategy implements GradeStrategy {
    public function calculate(array $scores): float {
        // Scores are [quiz, exam, project]; weights are 20%, 40%, 40%.
        if (count($scores) !== 3) {
            throw new InvalidArgumentException("Provide exactly three scores: quiz, exam, project.");
        }
        return ($scores[0] * 0.20) + ($scores[1] * 0.40) + ($scores[2] * 0.40);
    }
}
class TransmutedGradeStrategy implements GradeStrategy {
    public function calculate(array $scores): float {
        if (count($scores) === 0) return 0.0;
        $average = array_sum($scores) / count($scores);
        return min(100.0, max(60.0, 60.0 + ($average * 0.40)));
    }
}
class GradeCalculator {
    public function __construct(private GradeStrategy $strategy) {}
    public function setStrategy(GradeStrategy $strategy): void { $this->strategy = $strategy; }
    public function calculate(array $scores): float { return $this->strategy->calculate($scores); }
}

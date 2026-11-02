<?php
declare(strict_types=1);

class StudentRequest {
    public function __construct(public string $type) {}
}

interface Handler {
    public function setNext(Handler $handler): Handler;
    public function handle(StudentRequest $request): void;
}

abstract class BaseHandler implements Handler {
    private ?Handler $nextHandler = null;

    public function setNext(Handler $handler): Handler {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(StudentRequest $request): void {
        if ($this->canHandle($request)) {
            echo static::class . ": Processing {$request->type}...<br>";
            return;
        }

        echo static::class . ": Cannot process request.<br>";
        if ($this->nextHandler !== null) {
            $this->nextHandler->handle($request);
        } else {
            echo "No office can process this request.<br>";
        }
    }

    abstract protected function canHandle(StudentRequest $request): bool;
}

class StudentAffairsHandler extends BaseHandler {
    protected function canHandle(StudentRequest $request): bool {
        return $request->type === "Good Moral Certificate";
    }
}
class RegistrarHandler extends BaseHandler {
    protected function canHandle(StudentRequest $request): bool {
        return in_array($request->type, ["Certificate of Enrollment", "Transcript of Records"], true);
    }
}
class FinanceHandler extends BaseHandler {
    protected function canHandle(StudentRequest $request): bool {
        return $request->type === "Payment Concern";
    }
}
class ICTHandler extends BaseHandler {
    protected function canHandle(StudentRequest $request): bool {
        return $request->type === "Student ID Concern";
    }
}

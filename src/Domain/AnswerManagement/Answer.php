<?php

namespace App\Domain\AnswerManagement;

use App\Domain\AnswerManagement\Answer\AnswerId;
use App\Domain\QuestionManagement\Question\QuestionId;
use App\Domain\UserManagement\User;
use DateTimeImmutable;

class Answer
{
    private QuestionId $questionId;

    private AnswerId $answerId;

    private User $owner;

    private \DateTimeImmutable $datetime;

    private string $description;


    public function __construct(User $owner, QuestionId $questionId, string $description)
    {
        $this->questionId = $questionId;
        $this->answerId = new AnswerId();
        $this->owner = $owner;
        $this->datetime = new DateTimeImmutable();
        $this->description = $description;
    }

    public function owner(): User
    {
        return $this->owner;
    }

    public function questionId(): QuestionId
    {
        return $this->questionId;
    }

    public function description()
    {
        return $this->description;
    }

    public function appliedOn()
    {
        return $this->datetime;
    }

    public function lastEditedOn()
    {
        // TODO: write logic here
    }
}

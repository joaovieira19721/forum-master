<?php

namespace App\Domain\AnswerManagement\Answer\Events;

use App\Domain\AnswerManagement\Answer;
use App\Domain\AnswerManagement\Answer\AnswerId;
use App\Domain\QuestionManagement\Question;
use App\Domain\QuestionManagement\Question\QuestionId;
use App\Domain\UserManagement\User;
use App\Domain\UserManagement\User\UserId;
use spec\App\Domain\AnswerManagement\Answer\AnswerIdSpec;

class AnswerWasCreated
{
    private AnswerId $answerId;

    private UserId $owner;

    private Question $question;

    private string $description;

    public function __construct(Answer $answer)
    {
        $this->answerId = $answer->answerId();
        $this->owner = $answer->owner()->userId();
        $this->question = $answer->question();
        $this->description = $answer->description();
    }

    /**
     * @return AnswerId
     */
    public function answerId(): AnswerId
    {
        return $this->answerId;
    }

    /**
     * owner
     *
     * @return UserId
     */
    public function owner(): UserId
    {
        return $this->owner;
    }

    /**
     * title
     *
     * @return string
     */
    public function question(): Question
    {
        return $this->question;
    }

    /**
     * body
     *
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }
}

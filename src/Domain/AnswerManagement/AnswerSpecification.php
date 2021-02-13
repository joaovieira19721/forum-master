<?php


namespace App\Domain\AnswerManagement\Answer;

use App\Domain\AnswerManagement\Answer;

interface AnswerSpecification
{
    /**
     * Returns TRUE whenever the given question is satisfied by this specification
     *
     * @param Answer $answer
     * @return bool
     */
    public function isSatisfiedBy(Answer $answer): bool;

}
<?php

namespace App\Domain\AnswerManagement\Answer\Events;

use App\Domain\AnswerManagement\Answer\AnswerId;
use Slick\Event\Domain\AbstractEvent;
use Slick\Event\Event;

class AnswerWasEdited extends AbstractEvent implements Event
{
    /**
     * Creates a AnswerWasEdited
     * @param AnswerId $answerId
     * @param string $description
     */
    public function __construct(AnswerId $answerId, string $description)
    {
        parent::__construct();
        $this->answerId = $answerId;
        $this->description = $description;

    }

    public function answerId(): AnswerId
    {
        return $this->answerId;
    }

    public function description(): string
    {
        return $this->description;
    }
}

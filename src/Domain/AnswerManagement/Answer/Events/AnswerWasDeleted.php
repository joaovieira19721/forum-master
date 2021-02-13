<?php

namespace App\Domain\AnswerManagement\Answer\Events;

use App\Domain\AnswerManagement\Answer\AnswerId;
use Slick\Event\Domain\AbstractEvent;
use Slick\Event\Event;

class AnswerWasDeleted extends AbstractEvent implements Event
{
    private AnswerId $answerId;

    public function __construct(AnswerId $answerId)
    {
        parent::__construct();
        $this->answerId = $answerId;
    }

    public function answerId()
    {
        return $this->answerId;
    }
}

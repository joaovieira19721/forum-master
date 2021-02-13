<?php

namespace spec\App\Domain\AnswerManagement\Answer\Events;

use App\Domain\AnswerManagement\Answer;
use App\Domain\AnswerManagement\Answer\Events\AnswerWasCreated;
use PhpSpec\ObjectBehavior;

class AnswerWasCreatedSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AnswerWasCreated::class);
    }

    function let(Answer $answer)
    {
        $this->beConstructedWith($answer);
    }
}

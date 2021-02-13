<?php

namespace spec\App\Application\QuestionManagement;

use App\Application\QuestionManagement\DeleteQuestionCommand;
use App\Domain\QuestionManagement\Question\QuestionId;
use PhpSpec\ObjectBehavior;
use App\Domain\QuestionManagement\QuestionsRepository;

class DeleteQuestionCommandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new QuestionId());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionCommand::class);
    }

}

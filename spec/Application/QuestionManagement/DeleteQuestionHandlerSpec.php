<?php

namespace spec\App\Application\QuestionManagement;

use App\Application\QuestionManagement\DeleteQuestionHandler;
use App\Domain\QuestionManagement\Question\QuestionId;
use App\Domain\QuestionManagement\QuestionsRepository;
use App\Domain\QuestionManagement\Specification\CurrentUserOwnsQuestion;
use PhpSpec\ObjectBehavior;
use Slick\Event\EventDispatcher;


class DeleteQuestionHandlerSpec extends ObjectBehavior
{
    function let(
        QuestionsRepository $questions,
        EventDispatcher $dispatcher,
        CurrentUserOwnsQuestion $currentUserOwnsQuestion
    )
    {
        $this->beConstructedWith($questions, $dispatcher, $currentUserOwnsQuestion);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DeleteQuestionHandler::class);
    }
}

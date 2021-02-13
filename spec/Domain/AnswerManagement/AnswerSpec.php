<?php

namespace spec\App\Domain\AnswerManagement;

use App\Domain\AnswerManagement\Answer;
use App\Domain\QuestionManagement\Question\Events\QuestionWasEdited;
use App\Domain\QuestionManagement\Question\QuestionId;
use App\Domain\UserManagement\User;
use PhpSpec\ObjectBehavior;
use Slick\Event\EventGenerator;

class AnswerSpec extends ObjectBehavior
{
    private $description;

    function let(User $user, QuestionId $questionId)
    {
        $user->userId()->willReturn(new User\UserId());
        $this->description = "Sir, it is different time from other people!";
        $this->beConstructedWith($user, $questionId, $this->description);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Answer::class);
    }

    function it_has_a_user(User $user)
    {
        $this->owner()->shouldBe($user);
    }

    function it_has_a_question_id()
    {
        $this->questionId()->shouldBeAnInstanceOf(QuestionId::class);
    }

    function it_has_a_description()
    {
        $this->description()->shouldBe($this->description);
    }

/*    function its_an_event_generator()
    {
        $this->shouldBeAnInstanceOf(EventGenerator::class);
        $this->releaseEvents()[0]->shouldBeAnInstanceOf(Question\Events\AnswerWasCreated::class);
    } */

    function it_has_a_date_when_it_was_applied()
    {
        $this->appliedOn()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
    }

/*    function it_has_a_last_edited_on_date_time()
    {
        $this->lastEditedOn()->shouldBe(null);
    } */

/*    function answer_it_can_be_changed()
    {
        $description = "new answer";

        $this->releaseEvents();
        $this->change($description)->shouldBe($this->getWrappedObject());

        $this->description()->shouldBe($description);
        $this->lastEditedOn()->shouldBeAnInstanceOf(\DateTimeImmutable::class);
        $this->releaseEvents()[0]->shouldBeAnInstanceOf(QuestionWasEdited::class);
    } */

 /*   function it_can_be_converted_to_json(User $user)
    {
        $this->shouldBeAnInstanceOf(\JsonSerializable::class);
        $this->jsonSerialize()->shouldBe([
            "questionId" => $this->AnswerId()->getWrappedObject(),
            "description" => $this->description,
            "owner" => $user,
            "open" => true,
            "appliedOn" => $this->appliedOn()->getWrappedObject(),
            "lastEditedOn" => null,
        ]);
    } */
}

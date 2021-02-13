<?php


namespace App\UserInterface\QuestionManagement;

use App\Application\CommandBus;
use App\Application\QuestionManagement\DeleteQuestionCommand;
use App\Domain\Exception\EntityNotFound;
use App\Domain\Exception\FailedEntitySpecification;
use App\Domain\QuestionManagement\Question\QuestionId;
use App\UserInterface\ApiControllerMethods;
use App\UserInterface\UserManagement\OAuth2\AuthenticatedControllerInterface;
use App\UserInterface\UserManagement\OAuth2\AuthenticatedControllerMethods;
use Exception;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DeleteQuetionController extends AbstractController implements AuthenticatedControllerInterface
{
    use ApiControllerMethods;
    use AuthenticatedControllerMethods;

    /**
     * @var CommandBus
     */
    private CommandBus $commandBus;

    /**
     * Creates a EditQuestionController
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * Handles edit question command
     *
     * @param Request $request
     * @param string $questionId
     * @return Response
     * @throws Exception
     * @Route(path="/question/{questionId}", methods={"DELETE"})
     */
    public function handle(Request $request, string $questionId): Response
    {
        try {
            $questionId = new QuestionId($questionId);
            if (!$this->valid) {
                return $this->badRequest("Invalid or missing request data.");
            }

            $command = new DeleteQuestionCommand(
                $questionId
            );

            /** @var TYPE_NAME $command */
            $question = $this->commandBus->Delete($command);

        } catch (EntityNotFound $ex) {
            return $this->notFound($ex->getMessage());
        } catch (FailedEntitySpecification $ex) {
            return $this->preconditionFailed($ex->getMessage());
        } catch (InvalidUuidStringException $ex) {
            return $this->badRequest($ex->getMessage());
        }

        return new Response(json_encode($question), 200, ['content-type' => 'application/json']);
    }


/**
 * @OA\Delete (
 *     path="/question/{questionId}",
 *     tags={"Questions"},
 *     summary="Delete the question with the provided question identifier",
 *     operationId="DeleteQuestion",
 *     @OA\Response(
 *         response=400,
 *         description="Missing property or errors regarding data sent."
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Quesiton not found"
 *     ),
 *     @OA\Parameter(
 *         name="questionId",
 *         in="path",
 *         description="ID of question to Delete",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=412,
 *         description="Trying to delete a question that isn't owned by the authenticated user or it's open."
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="The question with changed values",
 *         @OA\JsonContent(ref="#/components/schemas/Question")
 *     ),
 *     @OA\RequestBody(
 *     request="DeleteQuestion",
 *         description="Object containing the new inforamtion needded to update the question stored with the privided identifier",
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/DeleteQuestionCommand")
 *     ),
 *     security={
 *         {"OAuth2.0-Token": {"user.management"}}
 *     }
 * )
 */

}


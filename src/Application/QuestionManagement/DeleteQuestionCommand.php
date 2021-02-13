<?php

namespace App\Application\QuestionManagement;

use App\Domain\QuestionManagement\Question\QuestionId;

class DeleteQuestionCommand
{
/* @var QuestionId */
    private QuestionId $questionId;

    /* @var string
     * @OA\Property(
     *     description="Question title",
     *     example="What time is it in Boston?"
     * )
     *
     */

    public function __construct(QuestionId $questionId)
    {
        $this->questionId = $questionId;

    }

    /* questionId
     *
     * @return QuestionId
     */
    public function questionId(): QuestionId
    {
        return $this->questionId;
    }

/* @OA\Delete (
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



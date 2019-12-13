<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class CourseController
 * @package App\Http\Controllers\Api
 */
class CourseController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/course",
     *     operationId="findCourses",
     *     summary="Mostrar cursos",
     *     @OA\Parameter(
     *         name="language_code",
     *         in="query",
     *         description="Language Code",
     *         required=false,
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="level_id",
     *         in="query",
     *         description="Level ID",
     *         required=false,
     *         style="form"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los cursos.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Course")
     *         )
     *
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Course::with(['level', 'language'])->get());
    }

}

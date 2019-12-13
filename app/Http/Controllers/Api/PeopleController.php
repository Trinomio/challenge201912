<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PeopleStoreRequest;
use App\Http\Requests\PeopleUpdateRequest;
use App\People;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleRequest;
use Illuminate\Http\JsonResponse;
/**
 *
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="API Personas",
 *         version="1.0",
 *         contact={
 *             "email": "mauricio.morales@trinom.io"
 *         }
 *     ),
 *     @OA\Server(
 *         description="API server",
 *         url="http://localhost:8000"
 *     )
 * )
 *
 * Class PeopleController
 * @package App\Http\Controllers\Api
 */
class PeopleController extends Controller {

    /**
     * @OA\Get(
     *     path="/api/people",
     *     operationId="findPeoples",
     *     summary="Mostrar personas",
     *     @OA\Parameter(
     *         name="course_id",
     *         in="query",
     *         description="Course ID",
     *         required=false,
     *         style="form"
     *     ),
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
     *         description="Mostrar todas las personas.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/People")
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
        return response()->json(People::with(['courses', 'courses.level', 'courses.language'])->get());
    }

    /**
     * @OA\Post(
     *     path="/api/people",
     *     operationId="postPeople",
     *     summary="Crea una persona con sus correspondientes cursos",
     *     @OA\RequestBody(
     *         request="People",
     *         description="People object",
     *         required=true,
     *         @OA\JsonContent(
     *             ref="#/components/schemas/People"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Persona creada.",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No se encontro la persona."
     *     )
     * )
     *
     * @param PeopleStoreRequest $request
     */
    public function store(PeopleStoreRequest $request)
    {

    }

    /**
     * @OA\Get(
     *     path="/api/people/{people_id}",
     *     operationId="findPeople",
     *     summary="Busca una persona",
     *     @OA\Parameter(
     *         name="people_id",
     *         in="query",
     *         description="People ID",
     *         required=false,
     *         style="form"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar una persona.",
     *         @OA\JsonContent(
     *             type="item",
     *             @OA\Items(ref="#/components/schemas/People")
     *         )
     *
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No se encontro la persona."
     *     )
     * )
     *
     * @param PeopleRequest $request
     * @return JsonResponse
     */
    public function show(PeopleRequest $request)
    {
        return response()->json(People::with(['courses', 'courses.level', 'courses.language'])->find($request->people_id));
    }

    /**
     * @OA\Put(
     *     path="/api/people/{people_id}",
     *     operationId="updatePeople",
     *     summary="actualiza una persona y su correspondientes cursos",
     *     @OA\Parameter(
     *         name="people_id",
     *         in="query",
     *         description="People ID",
     *         required=false,
     *         style="form"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Persona actualizada.",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No se encontro la persona."
     *     )
     * )
     *
     * @param PeopleUpdateRequest $request
     * @return JsonResponse
     */
    public function update(PeopleUpdateRequest $request)
    {
        return response()->json();

    }

    /**
     * @OA\Delete(
     *     path="/api/people/{people_id}",
     *     operationId="deletePeople",
     *     summary="Elimina una persona",
     *     @OA\Parameter(
     *         name="people_id",
     *         in="query",
     *         description="People ID",
     *         required=false,
     *         style="form"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Elimina una persona.",
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No se encontro la persona."
     *     )
     * )
     *
     * @param PeopleRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(PeopleRequest $request)
    {
        $deleted = People::with(['courses'])->whereKey($request->people_id)->delete();
        return response()->json([ 'deleted' => $deleted ]);
    }

}

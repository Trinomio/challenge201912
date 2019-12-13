<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PeopleStoreRequest;
use App\Http\Requests\PeopleUpdateRequest;
use App\People;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
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
     *     path="/api/peoples",
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
    public function index(Request $request)
    {
        $itemsPerPage = $request->input('per_page');
        $courseId = $request->input('course_id');
        $levelId = $request->input('level_id');
        $languageCode = $request->input('language_code');
        if($levelId || $languageCode || $courseId){
            $courses = Course::where('language_code','like','%'.$languageCode.'%');
            if( $levelId){
                $courses = $courses->where('level_id',$levelId);
            }
            if($courseId){
                $courses = $courses->where('id',$courseId);
            }
            $coursesIds = array_map(function($course){return $course['id'];},$courses->get()->toArray());  
            $peoples = People::whereHas('courses', function (Builder $query) use($coursesIds){
                                    $query->whereIn('courses.id', $coursesIds);
                                });
        } else {
            $peoples = People::query();
        }  
        return response()->json($peoples->paginate($itemsPerPage));
    }

    /**
     * @OA\Post(
     *     path="/api/peoples",
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
     *         @OA\MediaType(mediaType="application/json")
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
        $people = People::create($request->validated());
        
        $coursesIds = $this->getCoursesIds($request->input('courses'));
        $people->courses()->sync($coursesIds);

        return response() -> json(People::find($people->id));
    }

    /**
     * @OA\Get(
     *     path="/api/peoples/{people}",
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
    public function show(PeopleUpdateRequest $request, People $people)
    {

        return response()->json($people);
    }

    /**
     * @OA\Put(
     *     path="/api/peoples/{people}",
     *     operationId="updatePeople",
     *     summary="actualiza una persona y su correspondientes cursos",
     *     @OA\Parameter(
     *         name="people",
     *         in="path",
     *         description="People ID",
     *         required=false,
     *         style="form"
     *     ),
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
     *         description="Persona actualizada.",
     *         @OA\MediaType(mediaType="application/json")
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
    public function update(PeopleUpdateRequest $request, People $people)
    {
        $people->fill($request->validated());
        $people->save();
        $coursesIds = $this->getCoursesIds($request->input('courses'));
        $people->courses()->sync($coursesIds);

        return response()->json(People::find($people->id));
    }

    /**
     * @OA\Delete(
     *     path="/api/peoples/{people}",
     *     operationId="deletePeople",
     *     summary="Elimina una persona",
     *     @OA\Parameter(
     *         name="people",
     *         in="path",
     *         description="People ID",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Elimina una persona.",
     *         @OA\MediaType(mediaType="application/json")
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
    public function destroy(PeopleRequest $request, People $people)
    {
        $deleted = $people->delete();
        return response()->json([ 'deleted' => $deleted ]);
    }

    private function getCoursesIds($courses){
        return array_map(function($course){return $course['id'];},$courses);
    }

}

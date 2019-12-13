<?php

namespace App\Http\Controllers\Api;

use App\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class LevelController
 * @package App\Http\Controllers\Api
 */
class LevelController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/level",
     *     operationId="findLevels",
     *     summary="Mostrar niveles",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los niveles.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Level")
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
        return response()->json(Level::all());
    }

}

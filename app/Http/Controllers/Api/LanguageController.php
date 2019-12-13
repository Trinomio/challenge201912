<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\JsonResponse;

/**
 * Class LanguageController
 * @package App\Http\Controllers\Api
 */
class LanguageController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/language",
     *     operationId="findLanguages",
     *     summary="Mostrar idiomas",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los idiomas.",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Language")
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
        return response()->json(Language::all());
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Level",
 *     @OA\Property(
 *         property="id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         maxLength=30
 *     )
 * )
 *
 * Class Level
 * @package App
 */
class Level extends Model
{
    //
}

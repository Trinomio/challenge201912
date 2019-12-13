<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Language",
 *     @OA\Property(
 *         property="code",
 *         type="string",
 *         maxLength=2
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         maxLength=30
 *     )
 * )
 *
 * Class Language
 * @package App
 */
class Language extends Model
{
    //
}

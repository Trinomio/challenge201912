<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     schema="People",
 *     @OA\Property(
 *         property="id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="first_name",
 *         type="string",
 *         maxLength=30
 *     ),
 *     @OA\Property(
 *         property="last_name",
 *         type="string",
 *         maxLength=30
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         format="email",
 *         maxLength=254
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time"
 *     ),
 *     @OA\Property(
 *         property="courses",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Course")
 *     ),
 * )
 *
 * Class People
 * @package App
 */
class People extends Model
{
    /**
     * @var string
     */
    protected $table = 'peoples';

    /**
     * @return BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'students');
    }

}


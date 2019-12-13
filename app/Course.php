<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @OA\Schema(
 *     schema="Course",
 *     @OA\Property(
 *         property="id",
 *         type="integer"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         maxLength=30
 *     ),
 *     @OA\Property(
 *         property="language_code",
 *         type="string",
 *         maxLength=2
 *     ),
 *     @OA\Property(
 *         property="level_id",
 *         type="integer"
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
 *         property="level",
 *         ref="#/components/schemas/Level"
 *     ),
 *     @OA\Property(
 *         property="language",
 *         ref="#/components/schemas/Language"
 *     ),
 * )
 *
 * Class Course
 * @package App
 */
class Course extends Model
{

    protected $with = ['levels','language'];

    /**
     * @return BelongsTo
     */
    public function levels()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * @return BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class,'language_code', 'code');
    }

}

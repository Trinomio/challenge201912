<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PeopleRequest
 * @package App\Http\Requests
 *
 * @bodyParam people_id integer required A people ID.
 *
 * @property string $people_id
 */
class PeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'people_id' => 'exists:peoples,id'
        ];
    }
}

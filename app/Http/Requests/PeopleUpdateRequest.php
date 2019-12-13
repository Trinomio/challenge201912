<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class PeopleUpdateRequest
 * @package App\Http\Requests
 */
class PeopleUpdateRequest extends FormRequest
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
        $peopleId = $this->route('people');
        return [
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'email' => ['required','email',Rule::unique('peoples')->ignore($peopleId)],
            'courses' => ['array'],
            'courses.*.id' => ['exists:courses,id']
        ];
    }
}

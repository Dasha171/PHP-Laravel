<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>["required", "string", "max:150"],
            "country_id"=>["required", "exists:countries,id"],
            "duration"=>["required", "integer"],
            "year_of_issue"=>["required", "integer"],
            "age"=>["required", "integer"],
        ];
    }
}

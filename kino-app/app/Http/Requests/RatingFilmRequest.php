<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingFilmRequest extends FormRequest
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
            "film_id"=>["required", "exists:films,id"],
            "user_id"=>["required", "exists:users,id"],
            "ball"=>["required", "string"],
        ];
    }
}

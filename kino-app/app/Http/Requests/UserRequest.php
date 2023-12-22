<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "fio"=>["required", "string", "max:50"],
            "birthday"=>["nullable", "date"],
            "email"=>["required", "string"],
            "password"=>["required", "string"],
            "gender_id"=>["required", "exists:genders,id"],
        ];
    }
}

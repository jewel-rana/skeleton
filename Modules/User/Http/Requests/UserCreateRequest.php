<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users,email',
            'mobile' => 'bail|nullable',
            'password' => 'bail|required|min:8|max:20|same:password_confirm',
            'role' => 'bail|required|numeric|exists:roles,id'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}

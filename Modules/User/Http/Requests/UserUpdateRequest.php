<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'bail|required|email|unique:users,email,' . $this->user,
            'mobile' => 'bail|nullable',
            'password' => 'bail|nullable|min:8|max:20|same:password_confirm',
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

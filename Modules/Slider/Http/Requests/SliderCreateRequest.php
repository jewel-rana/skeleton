<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:191|unique:sliders',
            'description' => 'bail|nullable',
            'attachment' => 'bail|nullable'
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

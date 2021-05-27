<?php

namespace Modules\Slider\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideAddRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slider_id' => 'bail|required|integer|exists:sliders,id',
            'title' => 'bail|required|max:191',
            'description' => 'bail|required',
            'btn_text' => 'bail|nullable|max:25',
            'btn_link' => 'bail|nullable|max:191',
            'attachment' => 'bail|required|mimes:jpg,jpge,png,gif'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

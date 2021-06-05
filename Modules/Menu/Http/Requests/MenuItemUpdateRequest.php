<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'menu_id' => 'bail|required|exists:menus,id',
            'name' => 'bail|required',
            'css_class' => 'bail|nullable',
            'icon_class' => 'bail|nullable',
            'menu_url' => 'bail|required'
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

<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
       /* return [
            'title' => 'bail|required|unique:products,title,' . $this->product,
            'slug' => 'bail|nullable|unique:products,slug,' . $this->product,
            'description' => 'bail|required',
            'price' => 'bail|required|numeric',
            'category_id' => 'bail|required|integer|exists:categories,id',
            'upfront_price' => 'bail|nullable|numeric',
            'install_price' => 'bail|nullable|numeric',
            'sku' => 'bail|required|unique:products,sku,' . $this->product,
            'price_type' => 'bail|required|in:onetime,monthly,yearly',
            'status' => 'bail|required|in:0,1',
            'attachment' => 'bail|mimes:jpg,jpeg,png,gif'
        ];*/
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

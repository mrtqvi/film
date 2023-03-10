<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name'          =>  'required|min:2|max:250',
                'image'         =>  'required|image|min:2|max:2048',
                'description'   =>  'nullable|min:2|max:2000',
            ];
        }

        return [
            'name'          =>  'required|min:2|max:250',
            'image'         =>  'nullable|image|min:2|max:2048',
            'description'   =>  'nullable|min:2|max:2000',
        ];
    }

    public function attributes()
    {
        return [
            'name'          =>  'نام دسته بندی',
            'image'         =>  'تصویر دسته بندی',
            'description'   =>  'توضیحات دسته بندی'
        ];
    }
}
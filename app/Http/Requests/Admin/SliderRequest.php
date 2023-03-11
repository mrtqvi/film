<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if($this->isMethod('post')){
            return [
                'title' => 'required|max:120|min:2',
                'description' => 'required|max:600|min:2',
                'url' => 'nullable|max:500|',
                'image'  => 'required|image|mimes:png,jpg,jpeg,gif|max:3072|min:1',

            ];
        }
        else{
            return [
                'title' => 'required|max:120|min:2',
                'description' => 'required|max:600|min:2',
                'url' => 'max:500',
                'image' => 'image|mimes:png,jpg,jpeg,gif|max:3072|min:1',
            ];
        }
    }
}

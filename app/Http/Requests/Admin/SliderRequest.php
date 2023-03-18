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
                'series_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:series,id',
                'url' => 'nullable|max:500|',
                'image'  => 'required|image|mimes:png,jpg,jpeg,gif,webp|max:3072|min:1',

            ];
        }
        else{
            return [
                'title' => 'required|max:120|min:2',
                'description' => 'required|max:600|min:2',
                'series_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:series,id',
                'url' => 'max:500',
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:3072|min:1',
            ];
        }
    }

    public function attributes()
    {
        return [
          'series_id' => 'سریال اسلایدر'
        ];
    }
}

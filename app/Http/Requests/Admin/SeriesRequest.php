<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
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
        return [
            'fa_title'          =>  'required|min:2|max:300',
            'en_title'          =>  'required|min:2|max:300',
            'poster'            =>  'required|image|min:2|max:2048',
            'teaser'            =>  'nullable|exists:teasers,teaser',
            'description'       =>  'required|min:2|max:2000',
            'wallpaper'         =>  'nullable|min:2|image|max:4096',
            'imdb'              =>  'required|numeric|min:1|max:10',
            'year_construction' =>  'required|numeric',
            'ages'              =>  'required|numeric|min:3|max:30',
            'country'           =>  'required|string|max:140',
            'director'          =>  'required|min:2|max:300',
            'producer'          =>  'nullable|min:2|max:300'
        ];
    }
}

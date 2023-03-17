<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
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
                    'full_name' => 'required|max:120|min:2',
                    'image'  => 'required|image|mimes:png,jpg,jpeg,gif,webp|max:3072|min:1',

                ];
            }
            else{
                return [
                    'full_name' => 'required|max:120|min:2',
                    'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:3072|min:1',
                ];
            }
    }
}

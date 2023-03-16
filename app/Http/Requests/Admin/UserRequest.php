<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'full_name' => 'required|string|min:3|max:255',
                'user_name' => ['required', 'unique:users,user_name', 'string', 'max:64', 'min:4'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'email' => ['nullable', "unique:users,email", 'email'],
                'profile_photo' => 'nullable|image|max:2048|min:1',
                'is_admin' => 'nullable|in:0,1|numeric',
            ];
        }

        return [
            'full_name' => 'required|string|min:3|max:255',
            'user_name' => ['required', Rule::unique('users', 'user_name')->ignore($this->user->id), 'string', 'max:64', 'min:4'],
            'password' => ['nullable' , 'confirmed', Rules\Password::defaults()],
            'email' => ['nullable', Rule::unique('users', 'email')->ignore($this->user->id), 'email'],
            'profile_photo' => 'nullable|image|max:2048|min:1',
            'is_admin' => 'nullable|in:0,1|numeric',
        ];
    }
}
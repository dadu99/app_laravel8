<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'max:30',
            'address' => 'max:120',
            'role' => 'required',
            'password' => 'required|min:8|confirmed',
            'photo' => 'max:1024'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name are mandatory',
            'name.max' => 'Username cannot be longer than 50 characters',
            'email.required' => 'The email address is mandatory',
            'email.email' => 'You must enter a valid email address',
            'email.unique' => 'The email address is already registered on this site',
            'phone.max' => 'The phone number cannot have more than 30 characters',
            'address.max' => 'The address cannot have more than 120 characters',
            'role.required' => 'You must assign a role to the user',
            'password.required' => 'You must enter a user password',
            'password.min' => 'The password must have at least 8 characters',
            'password.confirmed' => 'The confirmed password is not correct!',
            'photo.max' => 'Fotografia utilizatorului nu poate aveam mai mult de 1 Mb!'
        ];
    }
}

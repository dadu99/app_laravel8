<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:8',
            'passwordnew' => 'required|min:8',
            'passwordnew_confirmation' => 'required|same:passwordnew'
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Password is mandatory',
            'password.min' => 'Password must have minimum 8 characters',
            'passwordnew.min' => 'Password must have minimum 8 characters',
            'passwordnew.required' => 'You must enter a new password',
            'passwordnew_confirmation.same' => 'Confirmation password are not same!'

        ];
    }
}

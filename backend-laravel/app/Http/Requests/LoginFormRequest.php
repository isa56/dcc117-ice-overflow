<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages() 
    {
        return [
            'email.required' => "O campo :attribute é obrigatorio",
            'email.email' => "O campo :attribute precisa ser um texto",
            'password.required' => "O campo senha é obrigatorio",
            'password.string' => "O campo senha precisa ser um texto",
            'password.min' => "O campo senha precisa ter pelo menos :value caracteres",
        ];
    }

    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json($validator->errors()->all(), 422)); 
    }
}

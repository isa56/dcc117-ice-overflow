<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\User;

class UsersFormRequest extends FormRequest
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
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "O campo nome é obrigatorio",
            'name.min' => "O campo nome precisa ter pelo menos :value caracteres",
            'email.required' => "O campo :attribute é obrigatorio",
            'email.email' => "O campo :attribute precisa ser um email valido",
            'email.unique' => "O email digitado já foi utilizado",
            'password.required' => "O campo senha é obrigatorio",
            'password.min' => "O campo senha precisa ter pelo menos 6 senhas",
            'profile_picture.image' => "O campo de imagem precisa ser uma imagem valida",
            'profile.mimes' => "O campo de imagem precisa ser um png, jpg ou jpeg", 
        ];
    }

    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(response()->json($validator->errors()->all(), 422)); 
    }
}

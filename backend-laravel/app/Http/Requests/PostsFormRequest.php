<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostsFormRequest extends FormRequest
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
            'title' => 'required|string|min:2',
            'body' => 'required|string|min:2',
            'materia' => 'required|string|min:2',
            'vote' => 'nullable|integer',
            'finished' => 'nullable|integer',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "O campo titulo é obrigatorio",
            'title.string' => "O campo titulo precisa ser um texto",
            'title.min' => "O campo titulo precisa ter pelo menos :value caracteres",
            'body.required' => "O campo body é obrigatorio",
            'body.string' => "O campo body precisa ser um texto",
            'body.min' => "O campo body precisa ter pelo menos :value caracteres",
            'materia.required' => "O campo materia é obrigatorio",
            'materia.string' => "O campo materia precisa ser um texto",
            'materi.min' => "O campo materia precisa ter pelo menos :value caracteres",
            'vote.integeer' => "O campo voto precisa ser um inteiro",
            'finished.min' => "O campo finalizado precisa ser um inteiro",
            'user_id.exists' => "O campo de usuario precisa ser um usuario valido ",
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors()->all(), 422));
    }
}

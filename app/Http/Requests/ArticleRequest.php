<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // array chiave valore 
        //chiave - sarà il campo input da validare
        //valore - la regola che vuoi validare. con | aggiunta di regola
        return [
            'title' => 'required', 
            'subtitle' => 'required',
            'description' => 'required'
        ];
    }

    // Override del metodo message per modificare i messaggi di errore 
    public function messages(){

        // array chiave valore
        // chiave - regola da validare (nomedelcampo.regoladavalidare)
        // valore - il messaggio che appare se quella non è stata rispettata
        return[
            'title.required' => ' Non hai inserito il titolo',
            'subtitle.required' => ' Non hai inserito il sottotitolo',
            'description.required' => ' Non hai inserito il testo',
        ];
    }
}

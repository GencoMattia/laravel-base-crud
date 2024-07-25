<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnimalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3|max:25",
            "description" => "required|max:65535|nullable",
            "origin" => "required|min:3|max:50",
            "img_url" => "required|url|max:65535|nullable",
            "additional_info" => "required|max:65535|nullable"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Il campo nome è obbligatorio.",
            "name.min" => "Il nome deve contenere almeno 3 caratteri.",
            "name.max" => "Il nome non può superare i 25 caratteri.",

            "description.required" => "Il campo descrizione è obbligatorio.",
            "description.max" => "La descrizione non può superare i 65535 caratteri.",

            "origin.required" => "Il campo origine è obbligatorio.",
            "origin.min" => "L'origine deve contenere almeno 3 caratteri.",
            "origin.max" => "L'origine non può superare i 50 caratteri.",

            "img_url.required" => "L'URL dell'immagine è obbligatorio.",
            "img_url.url" => "L'URL dell'immagine non è valido.",
            "img_url.max" => "L'URL dell'immagine non può superare i 65535 caratteri.",

            "additional_info.required" => "Il campo informazioni aggiuntive è obbligatorio.",
            "additional_info.max" => "Le informazioni aggiuntive non possono superare i 65535 caratteri.",
        ];
    }
}

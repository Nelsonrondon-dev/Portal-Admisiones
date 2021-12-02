<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateData extends FormRequest
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

            "file" => "required|mimes:pdf|max:10000",
            "name" => "required",
            "lastname" => "required",
            "phone" => "required",
            "country" => "required",
            "master" => "required",
            "youtube" => "required",
        ];

    }


    public function messages()
{
    return [
        'file.required' => 'Debes de agregar una carta de recomendación antes de enviar.',
        'file.mimes:pdf' => 'La carta de recomendación debe enviarse como archivo PDF',
        "name.required" => "Debes ingresar un nombre",
        "lastname.required" => "Debes ingresar un Apellido",
        "phone.required" => "Debes ingresar un telefono",
        "country.required" => "Debes selecionar un país",
        "master.required" => "Debes selecionar un master",
        "youtube.required" => "Debes de agregar un link con su video subido a Youtube"
    ];
}
}

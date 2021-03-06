<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolRequest extends FormRequest
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
            "name" => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg']
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute tidak boleh kosong",
            "image" => ":attribute harus berupa gambar",
            "mimes" => ":attribute harus bertipe png atau jpg",
        ];
    }

}

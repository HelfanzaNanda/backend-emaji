<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "email" => ['required', 'email','unique:users,email,' . $this->user->id ],
            'role' => ['required', 'in:penguji,pengawas']
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute tidak boleh kosong",
            "email" => ":attribute harus bertipe email",
            "in" => ":attribute harus penguji atau pengawas",
            "unique" => ":attribute sudah pernah di daftarkan"
        ];
    }
}

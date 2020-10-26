<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class TenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cnpj' => 'required|min:14|max:14|unique:tenants,cnpj',
            'nome' => 'required|min:5|max:50|unique:tenants,nome',
            'email' => 'required|min:5|max:100|unique:tenants,email',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cnpj.required' => 'O Cnpj e Requerido',
            'nome.required' => 'O Nome e Requerido',
            'email.required' => 'O Email e Requerido',
        ];
    }
}

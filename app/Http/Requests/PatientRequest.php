<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required',
            'mother_name' => 'required',
            'cpf' => 'required',
            'cns' => 'required',
            'cep' => 'required',
            'address' => 'required',
            'district' => 'required',
            'state' => 'required',
            'city' => 'required',
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{
    return [
        'name.required' => 'Nome é Obrigatório',
        'motherName.required' => 'Nome da mãe é Obrigatório',
        'cpf.required' => 'CPF é Obrigatório',
        'cns.required' => 'CNS é Obrigatório',
    ];
}
}

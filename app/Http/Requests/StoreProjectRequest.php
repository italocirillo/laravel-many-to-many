<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|min:1|max:200',
            'description' => 'nullable',
            'type_id' => ['nullable', 'exists:types,id'],
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }

    /**
     * Description
     * @returns {any}
     * */
    public function messages()
    {
        return [
            'title.required' => 'Inserisci un titolo',
            'title.unique' => 'Il titolo deve essere unico',
            'title.min' => 'Il titolo deve essere lungo più di :min',
            'title.max' => 'Il titolo deve essere più corto di :max',
            'type_id.exists' => 'Il tipo devo esistere',
            'technologies.exists' => 'La tecnologia devo esistere',
        ];
    }
}

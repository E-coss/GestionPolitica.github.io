<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVotantesRequest extends FormRequest
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
            'nombre' => 'required|max:50|min:4|string',
            'cedula' => 'required|unique:endvoters',
            'telefono' => 'required',
            'estudia' => 'required',
            'colegio_id' => 'required',
            'sexo' => 'required',
            'trabajo' => 'required',
            'ciudad' => 'required',
            'municipio' => 'required',
            'sector' => 'required',
            'calle' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ];
    }
    
    public function messages()
    {
    return [
        'nombre.required' => ':attribute es requerido',
        'nombre.max' => ':attribute no puede contener mas de 50 caracteres',
        'nombre.min' => ':attribute no puede contener menos de 3 caracteres',
        'nombre.string' => ':attribute solo puede contener letras.',
        'cedula.required' => ':attribute es requerida',
        'cedula.uniqued' => ':attribute introducida ya existe',
        'telefono.required' => ':attribute es requerido',
        'estudia.required' => ':attribute es requerido',
        'colegio_id.required' => ':attribute es requerido',
        'sexo.required' => ':attribute es requerido',
        'trabajo.required' => ':attribute es requerido',
        'ciudad.required' => ':attribute es requerido',
        'municipio.required' => ':attribute es requerido',
        'sector.required' => ':attribute es requerido',
        'calle.required' => ':attribute es requerido',
        'email.required' => ':attribute es requerido',
        'facebook.required' => ':attribute es requerido',
        'instagram.required' => ':attribute es requerido',
    ];
}
    
    public function attributes()
    {
    return [
        'nombre'    => 'El nombre del votante',
        'cedula'    => 'La cédula',
        'telefono'    => 'El teléfono',
        'estudia'    => 'Elija una opción',
        'colegio_id'    => 'El campo colegio',
        'sexo'    => 'El campo sexo',
        'trabajo'    => 'El campo trabajo',
        'ciudad'    => 'El campo ciudad',
        'municipio'    => 'Seleccione su municipio',
        'sector'    => 'Seleccione su sector',
        'calle'    => 'La calle',
        'email'    => 'El campo email',
        'facebook'    => 'El campo Facebook',
        'instagram'    => 'El campo instagram',
    ];
}

}

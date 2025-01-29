<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class MovieRequest extends FormRequest
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

        $rules = [];

        switch ($this->method()) {
            case 'POST':
                $rules['title'] = ['required', 'string', 'min:5', 'unique:movie'];
                break;

            case 'PUT':
                $rules['title'] = [
                    'required',
                    'min:5',
                    Rule::unique('movie')->ignore($this->movie, 'slug') // se rescata el modelo con this y indicamos el id con 'slug'
                ];
                break;
        }

        $rules['director'] = ['not_in:0'];
        $rules['budget'] = ['integer', 'between:-2147483647,2147483647'];
        $rules['homepage'] = ['min:5', 'string'];
        $rules['overview'] = ['min:5', 'string'];
        $rules['popularity'] = ['numeric', 'between:-999999.999999,999999.999999'];
        $rules['release_date'] = ['date_format:Y-m-d'];
        $rules['revenue'] = ['integer', 'between:-2147483647,2147483647'];
        $rules['runtime'] = ['integer', 'between:-2147483647,2147483647'];
        $rules['movie_status'] = ['min:5', 'string'];
        $rules['tagline'] = ['min:5', 'string'];
        $rules['vote_average'] = ['numeric', 'between:0,10'];
        $rules['vote_count'] = ['integer', 'between:-2147483647,2147483647'];
        $rules['img'] = ['image', 'mimes:png,jpg,jpeg,webp', 'max:2048'];

        return $rules;
    }

    public function messages()
    {
        return [
            // titulo
            'title.required' => 'El titulo es obligatorio.',
            'title.min' => 'El titulo debe tener al menos 5 caracteres.',
            'title.string' => 'El titulo solo puede contener letras y numeros.',
            'title.unique' => 'El titulo ya esta siendo usado.',

            // director
            'director.not_in' => 'Debes elegir un director.',
            'director.string' => 'El director solo puede contener letras y numeros.',

            // presupuesto
            'budget.integer' => 'El presupuesto debe ser un numero entero.',
            'budget.between' => 'El presupuesto debe ser entre -2147483647 y 2147483647.',

            // pagina oficial
            'homepage.min' => 'La pagina oficial debe tener al menos 5 caracteres.',

            // resumen
            'overview.min' => 'El resumen debe tener al menos 5 caracteres.',
            'overview.string' => 'El resumen solo puede contener letras y numeros.',

            // popularidad
            'popularity.numeric' => 'La popularidad debe ser un numero.',
            'popularity.between' => 'La popularidad debe ser entre -999999.999999 y 999999.999999.',

            // fecha de lanzamiento
            'release_date.date_format' => 'La fecha de lanzamiento debe tener el formato YYYY-MM-DD.',

            // venta de ingresos
            'revenue.integer' => 'Los ingresos deben ser un numero entero.',
            'revenue.between' => 'Los ingresos debe ser entre -2147483647 y 2147483647.',

            // duracion
            'runtime.integer' => 'La duracion debe ser un numero entero.',
            'runtime.between' => 'La duracion debe ser entre -2147483647 y 21474836475.',

            // estado
            'movie_status.min' => 'El estado de la pelicula debe tener al menos 5 caracteres.',
            'movie_status.string' => 'El estado de la pelicula solo puede contener letras y numeros.',

            // frase famosa
            'tagline.min' => 'La frase famosa debe tener al menos 5 caracteres.',
            'tagline.string' => 'La frase famosa solo puede contener letras y numeros.',

            // nota
            'vote_average.numeric' => 'La nota debe ser un numero.',
            'vote_average.between' => 'La nota debe ser entre 0.00 y 10.00',

            // total votos
            'vote_count.integer' => 'El total de votos debe ser un numero entero.',
            'vote_count.between' => 'El total de votos debe ser entre -2147483647 y 2147483647.',

            // imagen
            'img.image' => 'El archivo debe ser una imagen.',
            'img.mimes' => 'La imagen debe tener uno de los siguientes formatos: png, jpg, jpeg, webp.',
            'img.max' => 'La imagen no debe exceder los 2 MB de tamaño.',
        ];
    }
}

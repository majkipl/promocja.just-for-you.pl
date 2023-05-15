<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOpinionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'email' => 'bail|required|string|max:255|email:rfc,dns|unique:opinions,email',
            'free' => 'bail|required|numeric|between:1,3',
            'content' => 'bail|required|string|max:2048',
            'just_for_you_id' => 'bail|required|numeric|exists:applications,id|unique:opinions,application_id',
            'url' => 'bail|required|url',
            'legal_1' => 'bail|required',
            'legal_2' => 'bail|required',
            'legal_3' => 'bail',
            'legal_4' => 'bail',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'Pole jest wymagane.',
            'firstname.string' => 'Wprowadź wartość tekstową.',
            'firstname.min' => 'Pole wymaga minimum :min znaków.',
            'firstname.max' => 'Pole wymaga maksymalnie :max znaków.',
            'lastname.required' => 'Pole jest wymagane.',
            'lastname.string' => 'Wprowadź wartość tekstową.',
            'lastname.min' => 'Pole wymaga minimum :min znaków.',
            'lastname.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.required' => 'Pole jest wymagane.',
            'email.string' => 'Wprowadź wartość tekstową.',
            'email.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.email' => 'Błędny format wprowadzonych danych.',
            'email.unique' => 'Adres e-mail jest już zajęty.',
            'free.required' => 'Pole jest wymagane.',
            'free.number' => 'Wybierz prawidłową wartość.',
            'free.between' => 'Wybierz prawidłową wartość.',
            'content.required' => 'Pole jest wymagane.',
            'content.max' => 'Pole wymaga maksymalnie :max znaków.',
            'just_for_you_id.required' => 'Pole jest wymagane.',
            'just_for_you_id.numeric' => 'Pole wymaga Numeru zgłoszenia w akcji JUST FOR YOU.',
            'just_for_you_id.exists' => 'Pole wymaga Numeru zgłoszenia w akcji JUST FOR YOU.',
            'just_for_you_id.unique' => 'Już dodano opinię dla tego zgłoszenia.',
            'url.required' => 'Pole jest wymagane.',
            'url.url' => 'Pole jest adresu URL.',
            'legal_1.required' => 'Pole jest wymagane.',
            'legal_2.required' => 'Pole jest wymagane.',
        ];
    }
}

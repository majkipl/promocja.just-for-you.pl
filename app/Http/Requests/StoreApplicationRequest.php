<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'address' => 'bail|required|string|max:255',
            'city' => 'bail|required|string|min:2|max:64',
            'zip' => 'bail|required|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'voivodeship' => 'bail|required|numeric|between:1,16',
            'phone' => [
                'bail',
                'required',
                'regex:/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/'
            ],
            'email' => 'bail|required|string|max:255|email:rfc,dns|unique:applications,email',
            'product' => 'bail|required|numeric|between:1,42',
            'shop' => 'bail|required|numeric|between:1,2',
            'free' => 'bail|required|numeric|between:1,3',
            'where' => 'bail|required|numeric|between:1,8',
            'receipt_number' => 'bail|required|string|max:128',
            'img_receipt' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'img_ean' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
            'buy_at' => 'bail|required|date_format:d-m-Y',
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
            'address.required' => 'Pole jest wymagane.',
            'address.string' => 'Wprowadź wartość tekstową.',
            'address.max' => 'Pole wymaga maksymalnie :max znaków.',
            'city.required' => 'Pole jest wymagane.',
            'city.string' => 'Wprowadź wartość tekstową.',
            'city.min' => 'Pole wymaga minimum :min znaków.',
            'city.max' => 'Pole wymaga maksymalnie :max znaków.',
            'zip.required' => 'Pole jest wymagane.',
            'zip.regex' => 'Błędny format wprowadzonych danych.',
            'voivodeship.required' => 'Pole jest wymagane.',
            'voivodeship.number' => 'Wybierz prawidłową wartość.',
            'voivodeship.between' => 'Wybierz prawidłową wartość.',
            'phone.required' => 'Pole jest wymagane.',
            'phone.regex' => 'Błędny format wprowadzonych danych.',
            'email.required' => 'Pole jest wymagane.',
            'email.string' => 'Wprowadź wartość tekstową.',
            'email.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.email' => 'Błędny format wprowadzonych danych.',
            'email.unique' => 'Adres e-mail jest już zajęty.',
            'product.required' => 'Pole jest wymagane.',
            'product.number' => 'Wybierz prawidłową wartość.',
            'product.between' => 'Wybierz prawidłową wartość.',
            'shop.required' => 'Pole jest wymagane.',
            'shop.number' => 'Wybierz prawidłową wartość.',
            'shop.between' => 'Wybierz prawidłową wartość.',
            'free.required' => 'Pole jest wymagane.',
            'free.number' => 'Wybierz prawidłową wartość.',
            'free.between' => 'Wybierz prawidłową wartość.',
            'where.required' => 'Pole jest wymagane.',
            'where.number' => 'Wybierz prawidłową wartość.',
            'where.between' => 'Wybierz prawidłową wartość.',
            'receipt_number.required' => 'Pole jest wymagane.',
            'receipt_number.max' => 'Pole wymaga maksymalnie :max znaków.',
            'img_receipt.required' => 'Pole jest wymagane.',
            'img_receipt.file' => 'Pole wymaga pliku.',
            'img_receipt.mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_receipt.max' => 'Plik nie może być większy niż 4MB.',
            'img_ean.required' => 'Pole jest wymagane.',
            'img_ean.file' => 'Pole wymaga pliku.',
            'img_ean.mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_ean.max' => 'Plik nie może być większy niż 4MB.',
            'buy_at.required' => 'Pole jest wymagane.',
            'buy_at.date_format' => 'Pole wymaga daty.',
            'legal_1.required' => 'Pole jest wymagane.',
            'legal_2.required' => 'Pole jest wymagane.',
        ];
    }
}

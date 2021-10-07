<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CariStoreRequest extends FormRequest
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
            'ticari_unvani' => ['required', 'max:255', 'string'],
            'cari_kodu' => ['required', 'max:255', 'string'],
            'adi' => ['required', 'max:255', 'string'],
            'soyadi' => ['required', 'max:255', 'string'],
            'vergi_dairesi' => ['nullable', 'max:255', 'string'],
            'vergi_no' => ['nullable', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}

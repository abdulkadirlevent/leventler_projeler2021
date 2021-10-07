<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjelerStoreRequest extends FormRequest
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
            'cari_id' => ['required', 'exists:caris,id'],
            'proje_adi' => ['required', 'max:255', 'string'],
            'sozlezme_no' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'baslama_tarihi' => ['required', 'date'],
            'teslim_tarihi' => ['required', 'date'],
            'birim_fiyati' => ['nullable', 'numeric'],
        ];
    }
}

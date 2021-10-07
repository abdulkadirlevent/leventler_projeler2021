<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TesisatlarUpdateRequest extends FormRequest
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
            'tesisat_no' => ['required', 'max:255', 'string'],
            'baslama_tarihi' => ['required', 'date'],
            'teslim_tarihi' => ['required', 'date'],
            'projeler_id' => ['required', 'exists:projelers,id'],
            'birim_fiyati' => ['nullable', 'numeric'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternatifBansosRequest extends FormRequest
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
            'jenis_bansos_id' => 'required',
            'alternatif_id' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IzinRequest extends FormRequest
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

            'tgl_izin' => 'required',
            'wkt_mulai' => 'required',
            'wkt_selesai' => 'required|gte:wkt_mulai',
            'keterangan' => 'required',
        ];
    }
}

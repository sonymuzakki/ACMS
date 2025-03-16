<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApiLeadsBeliRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_sales' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'rencana_penggunaan' => 'required|string|max:255',
            'jenis_pembelian' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ];
    }
}

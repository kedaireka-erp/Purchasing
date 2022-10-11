<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_supplier' => 'required',
            // 'id_waktu' => 'required',
            'id_pembayaran' => 'required',
            'alamat_penagihan' => 'required',
            'signature' => 'required',
            'nama' => 'required',
            'nama_supplier' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_supplier.required' => 'supplier field is required',
            // 'id_waktu.required' => 'waktu pengiriman field is required',
            'id_pembayaran.required' => 'pembayaran field is required',
            'alamat_penagihan.required' => 'alamat penagihan field is required',
            'signature.required' => 'signature is required',
            'nama.required' => 'nama terang field is required',
            'nama_supplier.required' => 'atas nama field is required'

        ];
    }
}

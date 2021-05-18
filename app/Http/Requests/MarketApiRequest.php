<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketApiRequest extends FormRequest
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
        // For the store method
        if (request()->isMethod('post')) {
            return [
                'produk' => 'required|string',
                'kondisi' => 'required|string',
                'deskripsi' => 'required|string',
                'foto'=>'required|image|mimes:jpeg,jpg,png',
                'harga' => 'required|numeric',
                'tgl_ditambahkan' => 'required|date',
                'status' => 'in:Published,Draft',
            ];
        }

        // For the update method (i.e. put or patch method)
        else {
            return [
                'produk' => 'required|string',
                'kondisi' => 'required|string',
                'deskripsi' => 'required|string',
                'foto'=>'required|image|mimes:jpeg,jpg,png',
                'harga' => 'required|numeric',
                'tgl_ditambahkan' => 'required|date',
                'status' => 'in:Published,Draft'
            ];
        }
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'produk.required' => 'Produk field is required!',
                'kondisi.required' => 'Kondisi field is required!',
                'deskripsi.required' => 'Deskripsi field is required!',
                'foto.mimes' => 'Acceptable file types jpeg,png,jpg!',
                'harga.required' => 'Harga field is required!',
                'status.in' => 'Save as Published or Draft'
            ];
        } else {
            return [
                'produk.required' => 'Produk field is required!',
                'kondisi.required' => 'Kondisi field is required!',
                'deskripsi.required' => 'Deskripsi field is required!',
                'foto.mimes' => 'Acceptable file types jpeg,png,jpg!',
                'harga.required' => 'Harga field is required!',
                'status.in' => 'Save as Published or Draft'
            ];
        }
    }
} 
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_obat' => 'unique:products',
            'harga' => 'required',
            'status' => 'required',
            'image_url' => 'required',
            'tanggal_kadaluarsa' => 'nullable|date', // Jika tanggal_kadaluarsa bersifat opsional
            'deskripsi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'produsen' => 'nullable|string',
            'kategori' => 'nullable|string',
            'komposisi' => 'nullable|string',
            'kemasan' => 'nullable|string',
            'lokasi_penyimpanan' => 'nullable|string',
        ];
    }
}

<?php

namespace App\Http\Requests\Club;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClubRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => ['required', 'max:255'],
            'slug' => ['required', 'max:50'],
            'no_tlp' => ['nullable', 'max:20'],
            'email' => ['nullable', 'email'],
            'sejarah' => ['nullable'],
            'lokasi' => ['nullable'],
            'tahun_terbentuk' => ['nullable']
        ];
    }
}
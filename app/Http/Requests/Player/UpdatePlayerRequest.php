<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlayerRequest extends FormRequest
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
            'no_pg' => ['required', Rule::unique('players')->ignore($this->player)],
            'tgl_lahir' => ['nullable', 'date'],
            'position_id' => ['required'],
            'no_tlp' => ['nullable', Rule::unique('players')->ignore($this->player)]
        ];
    }

    public function attributes()
    {
        return [
            'no_pg' => 'nomor punggung',
            'position_id' => 'posisi',
            'no_tlp' => 'no telpon'
        ];
    }
}
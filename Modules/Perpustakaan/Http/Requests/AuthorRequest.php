<?php

namespace Modules\Perpustakaan\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => ['required', Rule::unique('authors', 'name')->whereNull('deleted_at')]
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'Nama Penulis tidak boleh kosong.',
        'name.unique'   => 'Nama Penulis sudah pernah dibuat.'
      ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasteroutRequest extends FormRequest
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
            'arrangefirst_score'=>['required','min:1','max:20'],
            'arrangesecond_score'=>['required','min:1','max:20'],
            'arrangethird_score'=>['required','min:1','max:20'],
        ];
    }
}

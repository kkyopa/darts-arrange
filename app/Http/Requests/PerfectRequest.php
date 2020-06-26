<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class PerfectRequest extends FormRequest
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
        // dd($this->arrangefirst_type);
        $rule = [];
        $rule['arrangefirst_type'] = ['required'];
        if (isset($this->arrangefirst_type) && $this->arrangefirst_type  !== 'DBULL' && $this->arrangefirst_type  !== 'SBULL') {
            $rule['arrangefirst_score'] = ['required'];
        }
        // secondのバリデーション
        if (isset($this->arrangesecond_type) && $this->arrangesecond_type  !== 'DBULL' && $this->arrangesecond_type  !== 'SBULL') {
            $rule['arrangesecond_score'] = ['required'];
        }
        if (isset($this->arrangesecond_score) && $this->arrangesecond_type  !== 'DBULL' && $this->arrangesecond_type  !== 'SBULL') {
            $rule['arrangesecond_type'] = ['required'];
        }
        // thirdのバリデーション
        if (isset($this->arrangethird_type) && $this->arrangethird_type  !== 'DBULL' && $this->arrangethird_type  !== 'SBULL') {
            $rule['arrangethird_score'] = ['required'];
        }
        if (isset($this->arrangethird_score) && $this->arrangethird_type  !== 'DBULL' && $this->arrangethird_type  !== 'SBULL') {
            $rule['arrangethird_type'] = ['required'];
        }
        return $rule;
    }
}

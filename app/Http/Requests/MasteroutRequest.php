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
            'arrangenumber' => 'required|max:4',
            'arrangefirst'=>['required','min:2','max:4','regex:/(S１|S２|S３|S４|S５|S６|S７|S８|S９|S１０|S１１|S１２|S１３|S１４|S１５|S１６|S１７|S１８|S１９|S２０|D１|D２|D３|D４|D５|D６|D７|D８|D９|D１０|D１１|D１２|D１３|D１４|D１５|D１６|D１７|D１８|D１９|D２０|T１|T２|T３|T４|T５|T６|T７|T８|T９|T１０|T１１|T１２|T１３|T１４|T１５|T１６|T１７|T１８|T１９|T２０|BULL)/'],
            'arrangesecond'=>['nullable','min:2','max:4','regex:/(S１|S２|S３|S４|S５|S６|S７|S８|S９|S１０|S１１|S１２|S１３|S１４|S１５|S１６|S１７|S１８|S１９|S２０|D１|D２|D３|D４|D５|D６|D７|D８|D９|D１０|D１１|D１２|D１３|D１４|D１５|D１６|D１７|D１８|D１９|D２０|T１|T２|T３|T４|T５|T６|T７|T８|T９|T１０|T１１|T１２|T１３|T１４|T１５|T１６|T１７|T１８|T１９|T２０|BULL)/'],
            'arrangethird'=>['nullable','min:2','max:4','regex:/(D１|D２|D３|D４|D５|D６|D７|D８|D９|D１０|D１１|D１２|D１３|D１４|D１５|D１６|D１７|D１８|D１９|D２０|T１|T２|T３|T４|T５|T６|T７|T８|T９|T１０|T１１|T１２|T１３|T１４|T１５|T１６|T１７|T１８|T１９|T２０|BULL)/'],
        ];
    }
}

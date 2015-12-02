<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddSongRequest extends Request
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
            'name' => 'required',
            'image' => 'required|mimes:mpga' //http://laravel.io/forum/03-29-2014-validator-mp3-mimes
        ];
    }
}

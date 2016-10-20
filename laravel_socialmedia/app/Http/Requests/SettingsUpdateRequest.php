<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SettingsUpdateRequest extends Request
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
            'profile_banner_url' => 'required',
            'profile_image_url' => 'required',
            'age' => 'required',

            ];
        }
}

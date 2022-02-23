<?php

namespace App\Http\Requests;

use App\Setting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $idFromRequest = $this->route()->user->id;
        return auth()->id() === $idFromRequest or auth()->user()->can('update all users') or auth()->user()->canUpdateUserWithId($idFromRequest);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'key_value' => ['required']
        ];

        return $rules;
    }
}

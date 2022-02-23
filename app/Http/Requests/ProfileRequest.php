<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use LVR\Phone\Phone;
use Illuminate\Support\Facades\Validator;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->id() or auth()->user()->can('update all users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'firstname'=>["required|regex:/^[\pL\s\-]+$/u"],
            //'lastname'=>["required|regex:/^[\pL\s\-]+$/u"],
            // 'phone_number'=>["required",new Phone],
            //'email' => ['required', 'email', Rule::unique('users')->ignore((int) $this->route()->profile ?? null)],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore((int) $this->route()->user->id ?? null)],
            //TODO Hier gaat het niet helemaal goed
            'password' => [$this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6']
        ];

        if(auth()->user()->hasRole('super admin')){
            $rules[] = ["company_id"=>["integer"," required"]];
        }

        return $rules;
    }
}

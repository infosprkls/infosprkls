<?php

namespace App\Http\Requests;

use App\Rules\AlphaNumericSpace;
use App\Rules\CompanyCheckRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class CompanyStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create a company');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
    	return [
            "name" => ["required", new AlphaNumericSpace(), new CompanyCheckRule($request->input('name'),"",$request->input('id'))],
            "contact_user_id" => "",
            "rechtsvorm" => "",
            "fiscal_number" => "",
            "kvk" => [new CompanyCheckRule("",$request->input('kvk'),$request->input('id'))],
            "streat_name" => "",
            "house_number" => "",
            "addition" => "",
            "post_code" => "",
            "place_name" => "",
            "www" => "",
            "logo"=>'sometimes|image|mimes:jpeg,png,svg|max:2048|dimensions:max_width=400,max_height=400'
        ];
    }
}

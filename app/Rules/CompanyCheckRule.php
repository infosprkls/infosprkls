<?php

namespace App\Rules;

use App\Company;
use Illuminate\Contracts\Validation\Rule;

class CompanyCheckRule implements Rule
{
    public $count;

    public function __construct($name,$kvk,$id = NULL)
    {
        $this->count = Company::check_company_exit($name,$kvk,$id);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
    	if($this->count){
    		return FALSE;
    	}else{
    		return TRUE;
    	}	
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Duplicate field are already exists.');
    }
}

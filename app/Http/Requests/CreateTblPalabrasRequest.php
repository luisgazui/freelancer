<?php

namespace FreelancerOnline\Http\Requests;

use FreelancerOnline\Http\Requests\Request;
use FreelancerOnline\Models\TblPalabras;

class CreateTblPalabrasRequest extends Request
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
        return TblPalabras::$rules;
    }
}

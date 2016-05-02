<?php

namespace FreelancerOnline\Http\Requests\API;

use FreelancerOnline\Models\TblMascara;
use InfyOm\Generator\Request\APIRequest;

class UpdateTblMascaraAPIRequest extends APIRequest
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
        return TblMascara::$rules;
    }
}

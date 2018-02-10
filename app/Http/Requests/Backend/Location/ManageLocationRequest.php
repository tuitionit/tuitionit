<?php

namespace App\Http\Requests\Backend\Location;

use App\Http\Requests\Request;

/**
 * Class ManageLocationRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageLocationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-institutes');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

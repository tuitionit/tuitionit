<?php

namespace App\Http\Requests\Backend\Session;

use App\Http\Requests\Request;

/**
 * Class ManageSessionRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageSessionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-sessions');
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

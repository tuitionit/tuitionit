<?php

namespace App\Http\Requests\Backend\Room;

use App\Http\Requests\Request;

/**
 * Class ManageRoomRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManageRoomRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-rooms');
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

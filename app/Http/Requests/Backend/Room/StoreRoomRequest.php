<?php

namespace App\Http\Requests\Backend\Room;

use App\Http\Requests\Request;

/**
 * Class StoreRoomRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreRoomRequest extends Request
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
            'name' => 'required',
            'description' => 'max:500',
            'capacity' => 'required|integer',
        ];
    }
}

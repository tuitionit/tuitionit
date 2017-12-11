<?php

namespace App\Http\Requests\Backend\Session;

use App\Http\Requests\Request;

/**
 * Class StoreSessionRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreSessionRequest extends Request
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
			'name' => 'required',
			'description' => 'max:500',
            'type' => 'required',
            'start_time' => 'required|date_format:"Y-m-d H:i"',
            'end_time' => 'sometimes|date_format:"Y-m-d H:i"|after:start_time',
            'start_date' => 'required_if:repeat,1|date_format:"Y-m-d"',
            'end_date' => 'sometimes|date_format:"Y-m-d"|after:start_date',
		];
	}
}

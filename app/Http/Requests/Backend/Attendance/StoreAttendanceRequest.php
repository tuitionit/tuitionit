<?php

namespace App\Http\Requests\Backend\Attendance;

use App\Http\Requests\Request;

/**
 * Class StoreAttendanceRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreAttendanceRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-attendances');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id' => 'required',
		];
	}
}

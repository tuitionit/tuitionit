<?php

namespace App\Http\Requests\Backend\Session;

use App\Http\Requests\Request;

/**
 * Class FetchSessionsRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class FetchSessionsRequest extends Request
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
			'start' => 'date',
			'end' => 'date',
			'timezone' => 'timezone',
		];
	}
}

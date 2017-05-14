<?php

namespace App\Http\Requests\Backend\Institute;

use App\Http\Requests\Request;

/**
 * Class StoreInstituteRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreInstituteRequest extends Request
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
			'name' => 'required',
			'code' => 'required|unique:institutes',
			'domain' => 'required|unique:institutes',
		];
	}
}

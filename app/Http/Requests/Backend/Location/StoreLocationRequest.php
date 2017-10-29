<?php

namespace App\Http\Requests\Backend\Location;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreLocationRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StoreLocationRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('manage-locations');
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
			'code' => 'required|unique:tenant.locations,code',
			'web' => 'nullable|url',
		];
	}
}

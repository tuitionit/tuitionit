<?php

namespace App\Http\Requests\Backend\Location;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateLocationRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class UpdateLocationRequest extends Request
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
	public function rules($id)
	{
		return [
			'name' => 'required',
			'code' => [
                'required',
                Rule::unique('locations')->where(function($query) {
                    if(!access()->allow('manage-institutes')) {
                        $query->where('institute_id', access()->user()->institute_id);
                    }
                })->ignore($id),
            ],
			'web' => 'nullable|url',
            'institute_id' => 'manageable_institute',
		];
	}
}

<?php

namespace App\Http\Requests\Backend\Payment;

use App\Http\Requests\Request;

/**
 * Class ManagePaymentRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class ManagePaymentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-subjects');
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

    /**
     * Set the localized / nice names for attributes.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('validation.attributes.backend.payments');
    }
}

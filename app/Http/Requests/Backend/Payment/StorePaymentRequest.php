<?php

namespace App\Http\Requests\Backend\Payment;

use App\Http\Requests\Request;

/**
 * Class StorePaymentRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class StorePaymentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-payments');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_id' => 'required|integer',
            'amount' => 'required|numeric',
            'notes' => 'max:500',
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

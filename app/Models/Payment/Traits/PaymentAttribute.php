<?php

namespace App\Models\Payment\Traits;

/**
 * Class PaymentAttribute.
 */
trait PaymentAttribute
{
    /**
     * @return string
     */
    public function getTypes()
    {
        return [
            self::TYPE_MONTHLY => trans('labels.payment.type.monthly'),
            self::TYPE_INSTALLMENT => trans('labels.payment.type.installment'),
            self::TYPE_SESSION => trans('labels.payment.type.session'),
            /*self::TYPE_SEMINAR => trans('labels.payment.type.seminar'),
            self::TYPE_TEST => trans('labels.payment.type.test'),*/
            self::TYPE_OTHER => trans('labels.payment.type.other'),
        ];
    }

    /**
     * @return string
     */
    public function getTypeLabel()
    {
        return $this->getTypes()[$this->type];
    }

    /**
     * @return string
     */
    public function getPaymentMethods()
    {
        return [
            self::PAYMENT_METHOD_CASH => trans('labels.payment.payment_method.cash'),
            self::PAYMENT_METHOD_BANK => trans('labels.payment.payment_method.bank'),
            self::PAYMENT_METHOD_CHEQUE => trans('labels.payment.payment_method.cheque'),
            self::PAYMENT_METHOD_CREDIT_CARD => trans('labels.payment.payment_method.credit_card'),
            self::PAYMENT_METHOD_OTHER => trans('labels.payment.payment_method.other'),
        ];
    }

    /**
     * @return string
     */
    public function getPaymentMethodLabel()
    {
        return $this->getPaymentMethods()[$this->payment_method];
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>".trans('labels.general.active').'</label>';
        }

        return "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.payments.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.payments.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.payments.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="'.trans('buttons.general.cancel').'"
             data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
             data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
             class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.payments.restore', $this).'" name="restore_user" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.payments.restore_user').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.payments.delete-permanently', $this).'" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.payments.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            // $this->getShowButtonAttribute().
            $this->getEditButtonAttribute().
            // $this->getStatusButtonAttribute().
            $this->getDeleteButtonAttribute();
    }
}

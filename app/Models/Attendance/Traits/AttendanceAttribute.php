<?php

namespace App\Models\Attendance\Traits;

/**
 * Class AttendanceAttribute.
 */
trait AttendanceAttribute
{
    /**
     * @return string
     */
    public function getMarkingMethods()
    {
        return [
            self::MARKING_METHOD_MANUAL => trans('labels.attendance.marking_method.manual'),
            self::MARKING_METHOD_MOBILE => trans('labels.attendance.marking_method.mobile'),
            self::MARKING_METHOD_BARCODE => trans('labels.attendance.marking_method.barcode'),
            self::MARKING_METHOD_NFC => trans('labels.attendance.marking_method.nfc'),
            self::MARKING_METHOD_MANUAL => trans('labels.attendance.marking_method.manual'),
        ];
    }

    /**
     * @return string
     */
    public function getMarkingMethodLabel()
    {
        return $this->getMarkingMethods()[$this->marking_method];
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
        return '<a href="'.route('admin.attendances.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.attendances.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.attendances.destroy', $this).'"
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
        return '<a href="'.route('admin.attendances.restore', $this).'" name="restore_user" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.attendances.restore_user').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.attendances.delete-permanently', $this).'" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.attendances.delete_permanently').'"></i></a> ';
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

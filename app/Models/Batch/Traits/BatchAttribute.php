<?php

namespace App\Models\Batch\Traits;

/**
 * Class BatchAttribute.
 */
trait BatchAttribute
{
    /**
     * @return string
     */
    public function getTypes()
    {
        return [
            self::TYPE_STANDARD => trans('labels.batch.type.standard'),
            self::TYPE_GROUP => trans('labels.batch.type.group'),
            self::TYPE_INDIVIDUAL => trans('labels.batch.type.individual'),
            self::TYPE_SEMINAR => trans('labels.batch.type.seminar'),
            self::TYPE_TEST => trans('labels.batch.type.test'),
            self::TYPE_OTHER => trans('labels.batch.type.other'),
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
    public function getStatusLabelAttribute()
    {
        return $this->isActive() ? trans('labels.general.active') : trans('labels.general.inactive');
    }

    /**
     * @return string
     */
    public function getStatusHtmlLabelAttribute()
    {
        return $this->isActive()
            ? "<label class='label label-success'>".trans('labels.general.active').'</label>'
            : "<label class='label label-danger'>".trans('labels.general.inactive').'</label>';
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
        return '<a href="'.route('admin.batches.show', $this).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.view').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.batches.edit', $this).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.general.crud.edit').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.batches.destroy', $this).'"
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
        return '<a href="'.route('admin.batches.restore', $this).'" name="restore_user" class="btn btn-xs btn-info"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.batches.restore_user').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.batches.delete-permanently', $this).'" name="delete_user_perm" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="'.trans('buttons.backend.batches.delete_permanently').'"></i></a> ';
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

    /**
     * Checks if the batch has the given student registered for it
     * @param integer $id
     * @return boolean
     */
    public function hasStudent($id)
    {
        return $this->students()->wherePivot('student_id', '=', $id)->exists();
    }
}

<?php

namespace App\Models\Assignment\Traits;

/**
 * Class AssignmentAttribute.
 */
trait AssignmentAttribute
{
    /**
     * @return string
     */
    public function getTypes()
    {
        return [
            self::TYPE_EXAM => trans('labels.assignment.type.exam'),
            self::TYPE_LAB => trans('labels.assignment.type.lab'),
            self::TYPE_PROJECT => trans('labels.assignment.type.project'),
            self::TYPE_REPORT => trans('labels.assignment.type.report'),
            self::TYPE_OTHER => trans('labels.assignment.type.other'),
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
        return '<a href="'.route('admin.assignments.show', $this).'" class="btn btn-xs btn-info">
            <i
                class="fa fa-search"
                data-toggle="tooltip"
                data-placement="top"
                title="'.trans('buttons.general.crud.view').'"
            ></i>
        </a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.assignments.edit', $this).'" class="btn btn-xs btn-primary">
            <i
                class="fa fa-pencil"
                data-toggle="tooltip"
                data-placement="top"
                title="'.trans('buttons.general.crud.edit').'"
            ></i>
        </a>';
    }

    /**
     * @return string
     */
    public function getStatusButtonAttribute()
    {
        if ($this->id != access()->id()) {
            switch ($this->status) {
                case 0:
                    return '<a href="'.route('admin.assignments.mark', [$this, 1]).'" class="btn btn-xs btn-success">
                        <i
                            class="fa fa-play"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="'.trans('buttons.backend.assignments.activate').'"
                        ></i>
                    </a>';
                // No break

                case 1:
                    return '<a href="'.route('admin.assignments.mark', [$this, 0]).'" class="btn btn-xs btn-warning">
                        <i
                            class="fa fa-pause"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="'.trans('buttons.backend.assignments.deactivate').'"
                        ></i>
                    </a>';
                // No break

                default:
                    return '';
                // No break
            }
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.assignments.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="'.trans('buttons.general.cancel').'"
             data-trans-button-confirm="'.trans('buttons.general.crud.delete').'"
             data-trans-title="'.trans('strings.backend.general.are_you_sure').'"
             class="btn btn-xs btn-danger"
         >
            <i class="fa
                fa-trash"
                data-toggle="tooltip"
                data-placement="top" title="'.trans('buttons.general.crud.delete').'"
            ></i>
        </a>';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.assignments.restore', $this).'" name="restore_user" class="btn btn-xs btn-info">
            <i
                class="fa fa-refresh"
                data-toggle="tooltip"
                data-placement="top"
                title="'.trans('buttons.backend.assignments.restore_user').'"
            ></i>
        </a>';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a
            href="'.route('admin.assignments.delete-permanently', $this).'"
            name="delete_user_perm"
            class="btn btn-xs btn-danger"
        >
            <i
                class="fa fa-trash"
                data-toggle="tooltip"
                data-placement="top"
                title="'.trans('buttons.backend.assignments.delete_permanently').'"
            ></i>
        </a>';
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

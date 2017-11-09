<?php

namespace App\Models\Session\Traits;

/**
 * Class SessionGroupAttribute.
 */
trait SessionGroupAttribute
{
    /**
     * @return string
     */
    public function getRepeatTypes()
    {
        return [
            self::REPEAT_TYPE_DAILY => trans('labels.session_group.repeat_type.daily'),
            self::REPEAT_TYPE_WEEKLY => trans('labels.session_group.repeat_type.weekly'),
            self::REPEAT_TYPE_MONTHLY => trans('labels.session_group.repeat_type.monthly'),
            self::REPEAT_TYPE_YEARLY => trans('labels.session_group.repeat_type.yearly'),
        ];
    }

    /**
     * @return string
     */
    public function getRepeatTypeLabel()
    {
        return $this->getRepeatTypes()[$this->repeat_type];
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
}

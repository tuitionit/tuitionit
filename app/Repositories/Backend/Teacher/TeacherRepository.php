<?php

namespace App\Repositories\Backend\Teacher;

use App\Repositories\BaseRepository;
use App\Models\Teacher\Teacher;

/**
 * Class TeacherRepository
 * @package App\Repositories\Backend\Teacher
 */
class TeacherRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Teacher::class;

    /**
     * @param int  $status
     *
     * @return mixed
     */
    public function getForDataTable($status = 1)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()
            ->select([
                'teachers.id',
                'teachers.name',
                'teachers.short_name',
                'teachers.level',
                'teachers.status',
                'teachers.created_at',
                'teachers.updated_at',
                'teachers.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }
}

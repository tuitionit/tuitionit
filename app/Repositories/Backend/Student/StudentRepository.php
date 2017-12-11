<?php

namespace App\Repositories\Backend\Student;

use App\Repositories\BaseRepository;
use App\Models\Student\Student;

/**
 * Class StudentRepository
 * @package App\Repositories\Backend\Student
 */
class StudentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Student::class;

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
                'students.id',
                'students.index_number',
                'students.name',
                'students.phone',
                'students.status',
                'students.created_at',
                'students.updated_at',
                'students.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }

    /**
     * @param string  $query
     *
     * @return mixed
     */
    public function searchByName($query)
    {
        $searchQuery = $this->query()
            ->select([
                'students.id',
                'students.index_number',
                'students.name',
            ])
            ->where('name', 'LIKE', '%' . $query . '%');

        return $searchQuery;
    }
}

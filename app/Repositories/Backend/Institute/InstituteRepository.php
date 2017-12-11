<?php

namespace App\Repositories\Backend\Institute;

use App\Repositories\BaseRepository;
use App\Models\Institute\Institute;

/**
 * Class InstituteRepository
 * @package App\Repositories\Backend\Institute
 */
class InstituteRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Institute::class;

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
                'institutes.id',
                'institutes.name',
                'institutes.code',
                'institutes.city',
                'institutes.phone',
                'institutes.status',
                'institutes.created_at',
                'institutes.updated_at',
                'institutes.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }
}

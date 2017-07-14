<?php

namespace App\Repositories\Backend\Session;

use App\Repositories\BaseRepository;
use App\Models\Session\Session;

/**
 * Class SessionRepository
 * @package App\Repositories\Backend\Session
 */
class SessionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Session::class;

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
        $dataTableQuery = $this->query();
            /*->select([
                'sessions.id',
                'sessions.name',
                'sessions.description',
                'sessions.start_time',
                'sessions.end_time',
                'sessions.status',
                'sessions.created_at',
                'sessions.updated_at',
                'sessions.deleted_at',
            ]);*/

        // active() is a scope on the UserScope trait
        return $dataTableQuery;
    }
}

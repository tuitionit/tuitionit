<?php

namespace App\Repositories\Backend\Room;

use App\Repositories\BaseRepository;

/**
 * Class RoomRepository
 * @package App\Repositories\Backend\Room
 */
class RoomRepository extends BaseRepository
{
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
                'rooms.id',
                'rooms.name',
                'rooms.code',
                'rooms.city',
                'rooms.phone',
                'rooms.status',
                'rooms.created_at',
                'rooms.updated_at',
                'rooms.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery->active($status);
    }
}

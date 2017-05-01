<?php

namespace App\Repositories\Backend\Location;

use App\Repositories\BaseRepository;

/**
 * Class LocationRepository
 * @package App\Repositories\Backend\Location
 */
class LocationRepository extends BaseRepository
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
                'locations.id',
                'locations.name',
                'locations.code',
                'locations.city',
                'locations.phone',
                'locations.status',
                'locations.created_at',
                'locations.updated_at',
                'locations.deleted_at',
            ]);

        // active() is a scope on the UserScope trait
        return $dataTableQuery->active($status);
    }
}

<?php

namespace App\Repositories\Backend\Location;

use App\Events\Backend\Location\LocationDeleted;
use App\Models\Location\Location;
use App\Repositories\BaseRepository;

/**
 * Class LocationRepository
 * @package App\Repositories\Backend\Location
 */
class LocationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Location::class;

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

    /**
     * @param \App\Models\Location\Location $location
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Location $location)
    {
        if ($location->delete()) {
            event(new LocationDeleted($location));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.locations.delete_error'));
    }
}

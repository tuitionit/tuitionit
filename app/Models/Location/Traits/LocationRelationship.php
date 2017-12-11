<?php

namespace App\Models\Location\Traits;

use App\Models\Access\User\User;
use App\Models\Institute\Institute;
use App\Models\Room\Room;
use App\Models\Student\Student;
use App\Models\Teacher\Teacher;

/**
 * Class LocationRelationship.
 */
trait LocationRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'location_student');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teachers()
    {
        return $this->belongsToMany(Student::class, 'location_teacher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Student::class, 'location_user');
    }
}

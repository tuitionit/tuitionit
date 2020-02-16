<?php

namespace App\Models\Assignment\Traits;

use App\Models\Access\User\User;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Location\Location;
use App\Models\Student\Student;
use App\Models\Assignment\Assignment;
use App\Models\Room\Room;
use App\Models\Subject\Subject;
use App\Models\Teacher\Teacher;

/**
 * Class AssignmentRelationship.
 */
trait AssignmentRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Assignment can be belong to only one Batch.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attendees()
    {
        return $this->belongsToMany(Student::class, 'assignment_student')
            ->withPivot(['score', 'status']);
    }
}

<?php

namespace App\Models\Institute;

use Illuminate\Database\Eloquent\Model;
use App\Models\Institute\Traits\InstituteAttribute;
use App\Models\Institute\Traits\InstituteRelationship;

class Institute extends Model
{
    use InstituteAttribute,
        InstituteRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'institutes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'domain', 'status'];
}

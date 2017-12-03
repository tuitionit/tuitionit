<?php

namespace App\Models\History;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsesTenantConnection;

/**
 * Class HistoryType
 * package App.
 */
class HistoryType extends Model
{
    use UsesTenantConnection;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'history_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}

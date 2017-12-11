<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsesTenantConnection;

/**
 * Class SocialLogin.
 */
class SocialLogin extends Model
{
    use UsesTenantConnection;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_logins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provider', 'provider_id', 'token', 'avatar'];
}

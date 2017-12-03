<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsesTenantConnection;

class Comment extends Model
{
    use UsesTenantConnection;
}

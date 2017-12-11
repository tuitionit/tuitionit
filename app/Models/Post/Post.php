<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsesTenantConnection;

class Post extends Model
{
    use UsesTenantConnection;
}

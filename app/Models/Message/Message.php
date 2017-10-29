<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsesTenantConnection;

class Message extends Model
{
    use UsesTenantConnection;
}

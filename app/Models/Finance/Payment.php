<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UsesTenantConnection;

class Payment extends Model
{
    use UsesTenantConnection;
}

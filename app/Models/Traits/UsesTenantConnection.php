<?php

/*
 * This file is part of the Tuitionix application.
 *
 * (c) Saranga Abeykoon <amisaranga@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://laravel-tenancy.com
 * @see https://github.com/hyn/multi-tenant
 */

namespace App\Models\Traits;

trait UsesTenantConnection
{
    public function getConnectionName()
    {
        return 'tenant';
    }
}

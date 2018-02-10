<?php
namespace App\Helpers\Database;

use App\Models\Institute\Institute;

/**
 * Trait TenantConnector
 */
trait TenantConnector
{
    /**
     * Switches tenant connection to selected institte
     * @param   \App\Models\Institute\Institute $institute
     */
    function reconnect(Institute $institute)
    {
        DB::purge('tenant');

        if (!empty($institute->host)) {
            Config::set('database.connections.tenant.host', $institute->host);
        }

        Config::set('database.connections.tenant.database', $institute->database);
        Config::set('database.connections.tenant.username', $institute->username);
        Config::set('database.connections.tenant.password', $institute->password);

        DB::reconnect('tenant');

        // Ping the database.
        // This will throw an exception in case the database does not exists or the connection fails
        Schema::connection('tenant')->getConnection()->reconnect();
    }
}

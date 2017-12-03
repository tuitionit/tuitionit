<?php

namespace Database;

use Illuminate\Support\Facades\DB;

/**
 * Class TruncateTable.
 */
trait TruncateTable
{
    /**
     * @param $table
     *
     * @return bool
     */
    protected function truncate($table, $connection = 'system')
    {
        $connection = DB::connection($connection);

        switch ($connection->getDriverName()) {
            case 'mysql':
                return $connection->table($table)->truncate();

            case 'pgsql':
                return $connection->statement('TRUNCATE TABLE '.$table.' RESTART IDENTITY CASCADE');

            case 'sqlite':
                return $connection->statement('DELETE FROM '.$table);
        }

        return false;
    }

    /**
     * @param array $tables
     */
    protected function truncateMultiple(array $tables, $connection = 'system')
    {
        foreach ($tables as $table) {
            $this->truncate($table, $connection);
        }
    }
}

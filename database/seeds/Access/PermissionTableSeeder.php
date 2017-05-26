<?php

use Carbon\Carbon;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class PermissionTableSeeder.
 */
class PermissionTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncateMultiple([config('access.permissions_table'), config('access.permission_role_table')]);

        /**
         * Don't need to assign any permissions to administrator because the all flag is set to true
         * in RoleTableSeeder.php.
         */


        $permissions = [];

        /**
         * Misc Access Permissions.
         */
        $permissions[] = [
            'name' => 'view-backend',
            'display_name' => 'View Backend',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        /*$permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'view-backend';
        $viewBackend->display_name = 'View Backend';
        $viewBackend->sort = 1;
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();*/


        /**
         * Institute permissions
         */
        $permissions[] = [
            'name' => 'manage-institute',
            'display_name' => 'Manage Institute',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        array_walk($permissions, function(&$permission, $key)
        {
            $permission['sort'] = ++$key;
        });

        DB::table(config('access.permissions_table'))->insert($permissions);

        $this->enableForeignKeys();
    }
}

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
        $this->disableForeignKeys('tenant');
        $this->truncateMultiple([config('access.permissions_table'), config('access.permission_role_table')], 'tenant');

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
        ];

        /**
         * Location permissions
         */
        $permissions[] = [
            'name' => 'manage-locations',
            'display_name' => 'Manage Locations',
        ];

        /**
         * Location permissions
         */
        $permissions[] = [
            'name' => 'manage-rooms',
            'display_name' => 'Manage Rooms',
        ];

        /**
         * Student permissions
         */
        $permissions[] = [
            'name' => 'manage-students',
            'display_name' => 'Manage Students',
        ];

        /**
         * Teacher permissions
         */
        $permissions[] = [
            'name' => 'manage-teachers',
            'display_name' => 'Manage Teachers',
        ];

        /**
         * Subject permissions
         */
        $permissions[] = [
            'name' => 'manage-subjects',
            'display_name' => 'Manage Subjects',
        ];

        /**
         * Session permissions
         */
        $permissions[] = [
            'name' => 'manage-sessions',
            'display_name' => 'Manage Sessions',
        ];

        /**
         * Course permissions
         */
        $permissions[] = [
            'name' => 'manage-courses',
            'display_name' => 'Manage Courses',
        ];

        /**
         * Batch permissions
         */
        $permissions[] = [
            'name' => 'manage-batches',
            'display_name' => 'Manage Batches',
        ];

        /**
         * Payment permissions
         */
        $permissions[] = [
            'name' => 'manage-payments',
            'display_name' => 'Manage Payments',
        ];

        /**
         * Assignment permissions
         */
        $permissions[] = [
            'name' => 'manage-assignments',
            'display_name' => 'Manage Assignments',
        ];

        $now = Carbon::now();

        array_walk($permissions, function(&$permission, $key, $now)
        {
            $permission['sort'] = ++$key;
            $permission['created_at'] = $now;
            $permission['updated_at'] = $now;
        }, $now);

        DB::connection('tenant')->table(config('access.permissions_table'))->insert($permissions);

        $this->enableForeignKeys('tenant');
    }
}

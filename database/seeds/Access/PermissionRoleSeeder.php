<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use App\Models\Access\Role\Role;
use Database\DisableForeignKeys;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder
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
        $this->truncate(config('access.permission_role_table'), 'tenant');

        /*
         * Default permissions for executive user
         * 1    = View Backend
         * 2    = Manage Institutes
         * 3    = Manage Locations
         * 4    = Manage Rooms
         * 5    = Manage Students
         * 6    = Manage Teachers
         * 7    = Manage Subjects
         * 8    = Manage Sessions
         * 9    = Manage Courses
         * 10    = Manage Batches
         * 11   = Manage Payments
         * 12   = Manage Assignments
         *
         */
        Role::find(2)->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11]);

        /*
         * Default permissions for manager
         * 1    = View Backend
         * 2    = Manage Institutes
         * 3    = Manage Locations
         * 4    = Manage Rooms
         * 5    = Manage Students
         * 6    = Manage Teachers
         * 7    = Manage Subjects
         * 8    = Manage Sessions
         * 9    = Manage Courses
         * 10   = Manage Batches
         * 11   = Manage Payments
         * 12   = Manage Assignments
         *
         */
        Role::find(3)->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11]);

        $this->enableForeignKeys('tenant');
    }
}

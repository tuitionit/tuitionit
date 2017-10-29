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
         * Assign view backend to executive role as example
         */
        Role::find(2)->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11]);

        $this->enableForeignKeys('tenant');
    }
}

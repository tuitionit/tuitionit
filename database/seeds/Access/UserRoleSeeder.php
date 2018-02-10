<?php

use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class UserRoleSeeder.
 */
class UserRoleSeeder extends Seeder
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
        $this->truncate(config('access.role_user_table'), 'tenant');

        //Attach admin role to admin user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::first()->attachRole(1);

        //Attach executive role to executive user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(2)->attachRole(2);

        //Attach manager role to manager user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(3)->attachRole(3);

        //Attach teacher role to teacher user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(4)->attachRole(4);

        //Attach student role to student user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(5)->attachRole(5);

        //Attach parent role to parent user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(6)->attachRole(6);

        //Attach user role to user user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model();
        $user_model::find(7)->attachRole(7);

        $this->enableForeignKeys('tenant');
    }
}

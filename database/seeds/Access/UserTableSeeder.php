<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
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
        $this->truncate(config('access.users_table'), 'tenant');

        //Add the master administrator, user id of 1
        $users = [
            [
                'name'              => 'Super Admin',
                'email'             => 'admin@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'administrator',
            ],
            [
                'name'              => 'Institute Director',
                'email'             => 'executive@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'executive',
            ],
            [
                'name'              => 'Location Manager',
                'email'             => 'manager@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'manager',
            ],
            [
                'name'              => 'Teacher',
                'email'             => 'teacher@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'teacher',
            ],
            [
                'name'              => 'Student',
                'email'             => 'student@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'student',
            ],
            [
                'name'              => 'Parent',
                'email'             => 'parent@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'parent',
            ],
            [
                'name'              => 'Default User',
                'email'             => 'user@tuitionix.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
                'type'              => 'standard',
            ],
        ];

        DB::connection('tenant')->table(config('access.users_table'))->insert($users);

        $this->enableForeignKeys('tenant');
    }
}

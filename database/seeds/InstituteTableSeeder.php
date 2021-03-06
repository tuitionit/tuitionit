<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class InstituteTableSeeder.
 */
class InstituteTableSeeder extends Seeder
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
        $this->truncate('institutes');

        //Add  default institute with id of 1
        $institutes = [
            [
                'name' => 'Tuitionix',
                'code' => 'TUITIONIX',
                'domain' => 'http://localhost:8000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'username' => 'www',
                'password' => 'wwwpwd',
                'database' => 'tuitionix_tenant_test',
            ],
            [
                'name' => 'Vijaya',
                'code' => 'VIJAYA',
                'domain' => 'https://vijaya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'username' => 'vijaya',
                'password' => 'vijayapwd',
                'database' => 'tuitionix_tenant_vijaya',
            ]
        ];

        DB::table('institutes')->insert($institutes);

        $this->enableForeignKeys();
    }
}

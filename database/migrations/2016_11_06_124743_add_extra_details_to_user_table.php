<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraDetailsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('type', 40)->default('student');
            $table->string('gender', 10)->nullable();
            $table->date('dob')->nullable();
            $table->text('avatar')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 40)->nullable();
            $table->string('state_province', 40)->nullable();
            $table->string('country', 40)->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('language', 10)->nullable();
            $table->string('timezone', 40)->nullable();
            $table->tinyInteger('is_online')->nullable();
            $table->timestamp('last_login_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn([
                'type',
                'status',
                'gender',
                'dob',
                'avatar',
                'address',
                'city',
                'state_province',
                'country',
                'postal_code',
                'phone',
                'mobile',
                'fax',
                'language',
                'timezone',
                'is_online',
                'last_login_time',
            ]);
        });
    }
}

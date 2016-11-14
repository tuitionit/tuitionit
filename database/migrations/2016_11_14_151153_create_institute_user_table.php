<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('institute_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('institute_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('institute_user');
    }
}

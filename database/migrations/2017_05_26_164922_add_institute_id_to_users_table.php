<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstituteIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('users', function (Blueprint $table) {
             $table->integer('institute_id')->unsigned()->nullable();
             $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('set null')->onUpdate('no action');
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
             $table->dropColumn('institute_id');
         });
     }
}

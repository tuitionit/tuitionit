<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstitutIdToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('teachers', function (Blueprint $table) {
             $table->integer('institute_id')->unsigned()->default(0);
             $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade')->onUpdate('no action');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('teachers', function ($table) {
             $table->dropColumn('institute_id');
         });
     }
}

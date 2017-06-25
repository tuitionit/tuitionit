<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSessionIdToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('payments', function (Blueprint $table) {
             $table->integer('session_id')->unsigned()->nullable();
             $table->foreign('session_id')->references('id')->on('institutes')->onDelete('set null')->onUpdate('no action');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('payments', function ($table) {
             $table->dropColumn('session_id');
         });
     }
}

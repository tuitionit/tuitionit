<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {


            $table->increments('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('notes')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('institute_id')->unsigned()->nullable();
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('students', function(Blueprint $table) {
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('set null')->onUpdate('no action');
 		    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('no action');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_institute_id_foreign');
			$table->dropForeign('students_user_id_foreign');
        });

        Schema::drop('students');
    }
}

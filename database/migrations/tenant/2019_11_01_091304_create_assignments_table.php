<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('type', 20);
            $table->timestamp('start_time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('end_time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('subject_id')->nullable()->unsigned();
            $table->integer('room_id')->nullable()->unsigned();
            $table->integer('location_id')->nullable()->unsigned();
            $table->integer('teacher_id')->nullable()->unsigned();
            $table->integer('batch_id')->nullable()->unsigned();
            $table->integer('course_id')->nullable()->unsigned();
            $table->text('teacher_comment')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('assignment_student', function (Blueprint $table) {
            $table->integer('assignment_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->decimal('score', 6, 2)->default('0.00');
            $table->tinyInteger('status')->nullable();
        });

        Schema::table('assignment_student', function (Blueprint $table) {
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('assignment_student');
    }
}

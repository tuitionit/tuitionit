<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppTables extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('code', 40)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state_province', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('postal_code', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->text('web')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('color', 10)->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('status', 20)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('batches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('type', 20)->nullable();
            $table->integer('location_id')->nullable()->unsigned();
            $table->integer('course_id')->nullable()->unsigned();
            $table->integer('subject_id')->nullable()->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('max_students')->nullable();
            $table->string('payment_type', 20)->nullable();
            $table->string('status', 20)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('batches', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('capacity')->nullable();
            $table->tinyInteger('has_sound')->nullable();
            $table->tinyInteger('has_blackboard')->nullable();
            $table->tinyInteger('has_whiteboard')->nullable();
            $table->tinyInteger('has_projector')->nullable();
            $table->tinyInteger('is_airconditioned')->nullable();
            $table->integer('location_id')->nullable()->unsigned();
            $table->string('status', 20)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('no action');
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name', 40)->nullable();
            $table->string('title')->nullable();
            $table->tinyInteger('level')->nullable();
            $table->text('cv')->nullable();
            $table->text('bio')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('index_number')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('notes')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->tinyInteger('status')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('students', function(Blueprint $table) {
 		    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
 		    $table->foreign('parent_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
         });

        Schema::create('session_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('end_date')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('repeat_type')->nullable(); // daily, weekly, monthly, yearly
            $table->tinyInteger('frequency')->nullable()->unsigned();
            $table->string('repeat_on')->nullable();
            $table->string('repeat_by')->nullable();
            $table->integer('count')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
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
            $table->tinyInteger('is_template')->nullable();
            $table->tinyInteger('is_repeating')->nullable();
            $table->integer('original_id')->nullable()->unsigned();
            $table->integer('session_group_id')->nullable()->unsigned();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('original_id')->references('id')->on('sessions')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('session_group_id')->references('id')->on('session_groups')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->string('id', 255);
            $table->text('value')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('category', 100)->nullable();
        });

        Schema::create('trackers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('icon', 40)->nullable();
            $table->integer('owner_id')->nullable()->unsigned();
        });

        Schema::table('trackers', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->tinyInteger('discount_type')->nullable()->default(0)->comment('0 = percentage, 1 = amount');
            $table->decimal('penalty', 10, 2)->nullable();
            $table->string('type', 20)->nullable();
            $table->integer('installment')->nullable();
            $table->date('month')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->integer('paid_by')->unsigned()->nullable();
            $table->integer('paid_to')->nullable()->unsigned();
            $table->integer('student_id')->nullable()->unsigned();
            $table->integer('batch_id')->nullable()->unsigned();
            $table->integer('session_id')->nullable()->unsigned();
            $table->string('payment_method', 20)->nullable()->default('cash');
            $table->tinyInteger('status')->default(0); // 0 = pending, 1 = paid, 2 = cancelled, 3 = refunded
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('paid_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('paid_to')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('session_id')->nullable()->unsigned();
            $table->string('marking_method')->nullable()->default('manual');
            $table->integer('marked_by')->nullable()->unsigned();
            $table->timestamp('in_time')->nullable();
            $table->timestamp('out_time')->nullable();
            $table->string('code')->nullable();
            $table->text('notes')->nullable();
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('marked_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->string('type', 20)->nullable()->default('text');
            $table->text('link')->nullable();
            $table->string('link_title', 255)->nullable();
            $table->text('link_description')->nullable();
            $table->text('link_image')->nullable();
            $table->integer('posted_by')->unsigned();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('posted_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('posted_by')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('reply_to')->nullable()->unsigned();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('posted_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reply_to')->references('id')->on('comments')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('batch_user', function (Blueprint $table) {
            $table->integer('batch_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status')->nullable();
        });

        Schema::table('batch_user', function (Blueprint $table) {
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('batch_student', function (Blueprint $table) {
            $table->integer('batch_id')->unsigned();
            $table->integer('student_id')->unsigned();
        });

        Schema::table('batch_student', function (Blueprint $table) {
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('course_tracker', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('tracker_id')->unsigned();
        });

        Schema::table('course_tracker', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('tracker_id')->references('id')->on('trackers')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('batch_tracker', function (Blueprint $table) {
            $table->integer('batch_id')->unsigned();
            $table->integer('tracker_id')->unsigned();
        });

        Schema::table('batch_tracker', function (Blueprint $table) {
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('tracker_id')->references('id')->on('trackers')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('tracker_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('tracker_id')->unsigned();
        });

        Schema::table('tracker_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('tracker_id')->references('id')->on('trackers')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('location_user', function (Blueprint $table) {
            $table->integer('location_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('location_user', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('location_student', function (Blueprint $table) {
            $table->integer('location_id')->unsigned();
            $table->integer('student_id')->unsigned();
        });

        Schema::table('location_student', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
        });

        Schema::table('subject_teacher', function (Blueprint $table) {
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('location_teacher', function (Blueprint $table) {
            $table->integer('location_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
        });

        Schema::table('location_teacher', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('no action');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject', 255);
            $table->text('body');
            $table->string('type', 40)->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->integer('sender_id')->unsigned();
            $table->integer('reply_to')->nullable()->unsigned();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('reply_to')->references('id')->on('messages')->onDelete('set null')->onUpdate('no action');
        });

        Schema::create('message_user', function (Blueprint $table) {
            $table->integer('message_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('seen_at')->nullable();
        });

        Schema::table('message_user', function (Blueprint $table) {
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('no action');
        });
    }

/**
 * Reverse the migrations.
 *
 * @return void
 */
    public function down()
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('batch_user');
        Schema::dropIfExists('batch_student');
        Schema::dropIfExists('course_tracker');
        Schema::dropIfExists('batch_tracker');
        Schema::dropIfExists('tracker_user');
        Schema::dropIfExists('location_user');
        Schema::dropIfExists('location_student');
        Schema::dropIfExists('subject_teacher');
        Schema::dropIfExists('location_teacher');
        Schema::dropIfExists('message_user');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('trackers');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('session_groups');
        Schema::dropIfExists('students');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('batches');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('locations');
    }
}

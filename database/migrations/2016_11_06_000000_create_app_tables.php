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
            $table->engine = 'InnoDB';

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
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('color', 10)->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('status', 20)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('batches', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('type', 20)->nullable();
            $table->integer('location_id')->nullable()->unsigned();
            $table->integer('course_id')->nullable()->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('max_students')->nullable();
            $table->string('payment_type', 20)->nullable();
            $table->string('status', 20)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('batches', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->integer('capacity')->nullable();
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
            $table->engine = 'InnoDB';

            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('user_id')->unsigned();
            $table->string('short_name', 40)->nullable();
            $table->string('title', 255)->nullable();
            $table->tinyInteger('level')->nullable();
            $table->text('cv')->nullable();
            $table->text('bio')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('type', 20);
            $table->timestamp('start_time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('end_time')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('subject_id')->nullable()->unsigned();
            $table->integer('room_id')->nullable()->unsigned();
            $table->integer('teacher_id')->nullable()->unsigned();
            $table->integer('batch_id')->nullable()->unsigned();
            $table->integer('course_id')->nullable()->unsigned();
            $table->tinyInteger('is_template')->nullable();
            $table->text('teacher_comment')->nullable();
            $table->integer('original_id')->nullable()->unsigned();
            $table->tinyInteger('status')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('teacher_id')->references('user_id')->on('teachers');
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('original_id')->references('id')->on('sessions');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('id', 255);
            $table->text('value')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('category', 100)->nullable();
        });

        Schema::create('trackers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('icon', 40)->nullable();
            $table->integer('owner_id')->nullable()->unsigned();
        });

        Schema::table('trackers', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::create('batch_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('batch_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status')->nullable();
        });

        Schema::table('batch_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('course_tracker', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('course_id')->unsigned();
            $table->integer('tracker_id')->unsigned();
        });

        Schema::table('course_tracker', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('tracker_id')->references('id')->on('trackers');
        });

        Schema::create('batch_tracker', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('batch_id')->unsigned();
            $table->integer('tracker_id')->unsigned();
        });

        Schema::table('batch_tracker', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('batch_id')->references('id')->on('batches');
            $table->foreign('tracker_id')->references('id')->on('trackers');
        });

        Schema::create('tracker_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('user_id')->unsigned();
            $table->integer('tracker_id')->unsigned();
        });

        Schema::table('tracker_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tracker_id')->references('id')->on('trackers');
        });

        Schema::create('location_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('location_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('location_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('subject_teacher', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
        });

        Schema::table('subject_teacher', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('teacher_id')->references('user_id')->on('teachers');
        });

        Schema::create('location_teacher', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('location_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
        });

        Schema::table('location_teacher', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('teacher_id')->references('user_id')->on('teachers');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->engine = 'InnoDB';

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
            $table->engine = 'InnoDB';

            $table->foreign('reply_to')->references('id')->on('messages');
        });

        Schema::create('message_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('message_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('seen_at')->nullable();
        });

        Schema::table('message_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('payment', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->decimal('amount', 10, 2);
            $table->string('type', 20)->nullable();
            $table->integer('installment')->nullable();
            $table->date('month')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->integer('paid_by')->unsigned();
            $table->integer('paid_to')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->string('payment_method', 20)->nullable()->default('cash');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('payment', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('paid_by')->references('id')->on('users');
            $table->foreign('paid_to')->references('id')->on('users');
            $table->foreign('batch_id')->references('id')->on('batches');

        });

        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';

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
            $table->engine = 'InnoDB';

            $table->foreign('posted_by')->references('id')->on('users');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';

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
            $table->engine = 'InnoDB';

            $table->foreign('posted_by')->references('id')->on('users');
            $table->foreign('reply_to')->references('id')->on('comments');
            $table->foreign('post_id')->references('id')->on('posts');
        });

    }

/**
 * Reverse the migrations.
 *
 * @return void
 */
    public function down()
    {
        Schema::drop('subjects');
        Schema::drop('courses');
        Schema::drop('batches');
        Schema::drop('locations');
        Schema::drop('rooms');
        Schema::drop('teachers');
        Schema::drop('sessions');
        Schema::drop('settings');
        Schema::drop('trackers');
        Schema::drop('batch_user');
        Schema::drop('course_tracker');
        Schema::drop('batch_tracker');
        Schema::drop('tracker_user');
        Schema::drop('location_user');
        Schema::drop('subject_teacher');
        Schema::drop('location_teacher');
        Schema::drop('messages');
        Schema::drop('message_user');
        Schema::drop('payment');
        Schema::drop('posts');
        Schema::drop('comments');

    }
}

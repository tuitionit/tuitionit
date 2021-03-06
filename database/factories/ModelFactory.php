<?php

use Carbon\Carbon;
use Faker\Generator;
use App\Models\Batch\Batch;
use App\Models\Course\Course;
use App\Models\Institute\Institute;
use App\Models\Payment\Payment;
use App\Models\Room\Room;
use App\Models\Session\Session;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Models\Location\Location;
use App\Models\Access\Role\Role;
use App\Models\Access\User\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'name'              => $faker->name,
        'email'             => $faker->safeEmail,
        'password'          => $password ?: $password = bcrypt('secret'),
        'remember_token'    => str_random(10),
        'confirmation_code' => md5(uniqid(mt_rand(), true)),
    ];
});

$factory->state(User::class, 'active', function () {
    return [
        'status' => 1,
    ];
});

$factory->state(User::class, 'inactive', function () {
    return [
        'status' => 0,
    ];
});

$factory->state(User::class, 'confirmed', function () {
    return [
        'confirmed' => 1,
    ];
});

$factory->state(User::class, 'unconfirmed', function () {
    return [
        'confirmed' => 0,
    ];
});

/*
 * Roles
 */
$factory->define(Role::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'all'  => 0,
        'sort' => $faker->numberBetween(1, 100),
    ];
});

$factory->state(Role::class, 'admin', function () {
    return [
        'all' => 1,
    ];
});

/*
 * Institute
 */
$factory->define(Institute::class, function (Generator $faker) {
     return [
         'name'     => $faker->name,
         'code'     => str_random(8),
         'domain'   => str_random(10),
         'username' => str_random(10),
         'password' => str_random(10),
         'database' => str_random(10),
         'status'   => 1,
     ];
 });

/*
 * Payment
 */
$factory->define(Payment::class, function (Generator $faker) {
     return [
         'amount'   => $faker->randomFloat(2),
         'paid_at'  => Carbon::now(),
         'status'   => 1,
     ];
 });

/*
 * Student
 */
$factory->define(Student::class, function (Generator $faker) {
    return [
        'index_number'  => $faker->unique()->randomDigit,
        'name'          => $faker->name,
        'status'        => 1,
    ];
});

/*
 * Subject
 */
$factory->define(Subject::class, function (Generator $faker) {
    return [
        'name'         => $faker->name,
        'description'  => str_random(100),
        'status'       => 1,
    ];
});

/*
 * Batch
 */
$factory->define(Batch::class, function (Generator $faker) {
    return [
        'name'         => str_random(20),
        'description'  => str_random(100)
    ];
});

/*
 * Session
 */
$factory->define(Session::class, function (Generator $faker) {
    return [
        'name'         => str_random(20),
        'description'  => str_random(100),
        'type'         => Session::TYPE_STANDARD,
        'start_time'   => Carbon::now(),
        'end_time'     => Carbon::now()->addHours(3),
        'status'       => 1,
    ];
 });

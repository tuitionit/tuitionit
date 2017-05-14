<?php

use Faker\Generator;
use App\Models\Session\Session;
use App\Models\Course\Course;
use App\Models\Institute\Institute;
use App\Models\Room\Room;
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
         'status'   => 1,
     ];
 });

/*
 * Student
 */
$factory->define(Student::class, function (Generator $faker) {
     return [
         'name'     => $faker->name,
         'code'     => str_random(8),
         'domain'   => str_random(10),
         'status'   => 1,
     ];
 });

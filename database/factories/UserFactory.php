<?php

use App\Entity\User;
use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$localisedFaker = Factory::create("ru_RU");

$factory->define(App\Entity\User::class, function (Faker $faker) use ($localisedFaker) {
    $active = $faker->boolean;
    $phoneActive = $faker->boolean;

    return [
        'name' => $localisedFaker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $localisedFaker->unique()->phoneNumber,
        'phone_verified' => $phoneActive,
        'last_name' => $localisedFaker->lastName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'status' => $active ? User::STATUS_ACTIVE : User::STATUS_WAIT,
        'role' => $active ? $faker->randomElement([User::ROLE_USER, User::ROLE_ADMIN]) : User::ROLE_USER,
        'verify_token' => $active ? null : Str::uuid(),
        'phone_verify_token' => $phoneActive ? null : Str::uuid(),
        'phone_verify_token_expire' => $phoneActive ? null : Carbon::now()->addSeconds(300),
    ];
});

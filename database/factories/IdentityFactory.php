<?php

use Faker\Generator as Faker;

$factory->define(Wuwx\LaravelConnect\Identity::class, function (Faker $faker) {
    return [
        'identifier' => $faker->name,
        'provider' => $faker->name,
    ];
});

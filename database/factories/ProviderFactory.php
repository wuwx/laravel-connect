<?php

use Faker\Generator as Faker;

$factory->define(Wuwx\LaravelConnect\Provider::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'driver'  => $faker->name,
        'enabled' => true,
    ];
});

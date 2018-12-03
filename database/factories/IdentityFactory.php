<?php

use Faker\Generator as Faker;

$factory->define(Wuwx\LaravelConnect\Identity::class, function (Faker $faker) {
    return [
        'provider' => 'github',
        'identifier' => '12345678',
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
    ];
});

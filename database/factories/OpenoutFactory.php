<?php

use App\Openout;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Openout::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'arrangenumber' => '180',
        'arrangefirst' => 60,
        'arrangesecond' => 60,
        'arrangethird' => 60,
        'arrangememo' => 'アレンジメモ',
    ];
});
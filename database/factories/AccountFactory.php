<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    static $bank_image;
    return [
        'title'=> $faker->company,
        'agency'=> $faker->randomNumber(3),
        'account_number' => $faker->randomNumber(5),
        'balance' => $faker->randomNumber(4),
        'balance_initial' => $faker->randomNumber(4),
        'bank_id' => $faker->numberBetween(1, 170),
        'bank_image' => $bank_image ?: $bank_image = 'none.jpg'
    ];
});

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Account;

class AccountFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(Account::TYPES),
            'balance' => $this->faker->randomFloat(2, 0, 100000),
            'currency' => $this->faker->randomElement(Account::CURRENCIES),
        ];
    }
}
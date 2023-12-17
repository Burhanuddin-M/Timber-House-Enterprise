<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->numberBetween(100, 1000),
            'type' => fake()->randomElement([Transaction::DEBIT, Transaction::CREDIT, Transaction::DEPOSIT]),
            'note' => fake()->text(50),
        ];
    }
}

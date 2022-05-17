<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'level' => $this->faker->randomElement(['Ringan', 'Sedang', 'Berat']),
            'desc' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 30000, 800000),
            'status' => $this->faker->randomElement(['Order', 'Pickup', 'On Service', 'Complete', 'Failed']),
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'customer_id' => rand(1, Customer::count()),
            'id_technician' => rand(1, Technician::count()),
        ];
    }
}

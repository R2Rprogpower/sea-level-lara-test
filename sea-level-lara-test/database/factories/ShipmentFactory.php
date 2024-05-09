<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['Pending','Processed','Lost']);

        $payment_type = $this->faker->randomElement(['in_advance','on_receiving']); //
        $postal_service = $this->faker->randomElement(['np','up']); //

        return [
            'sender_id' => Customer::factory(),
            'receiver_id' => Customer::factory(),
            'comment' => $this->faker->realTextBetween(10, 100),
            'status' => $status,
            'postal_service' => $postal_service,
            'payment_type' => $payment_type,
            'date_created' => $this->faker->dateTimeThisDecade(),
            'date_processed' => $status == 'Processed' ? $this->faker->dateTimeThisDecade() : NULL,
        ];



    }
}

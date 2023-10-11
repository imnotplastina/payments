<?php

namespace App\Services\Orders\Factories;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Orders\Models\Order;
use App\Supports\AmountValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Services\Orders\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'status' => OrderStatusEnum::pending,
            'currency_id' => 'RUB',
            'amount' => new AmountValue(
                $this->faker->randomFloat(2, 1, 10000)
            )
        ];
    }
}

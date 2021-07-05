<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(3),
            'description' => $this->faker->text,
            'discount_percentage' => $this->faker->randomNumber(1),
            'Expiry_date' => $this->faker->date('2021-06-09'),
        ];
    }
}

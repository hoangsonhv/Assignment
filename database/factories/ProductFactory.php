<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name"=>$this->faker->name(),
            "description"=>$this->faker->word,
            "price"=>$this->faker->numberBetween(120,330)*100,
            "qty"=>$this->faker->randomDigitNotZero(),
            "category_id"=>$this->faker->numberBetween(1,100),
            "brand_id"=>$this->faker->numberBetween(1,100),
        ];
    }
}

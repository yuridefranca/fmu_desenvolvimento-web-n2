<?php

namespace Database\Factories;

use App\Models\Produto;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nome" => $this->faker->word(),
            "descricao" => $this->faker->sentence(),
            "preco" => $this->faker->randomFloat(2, 1, 2000),
            "quantidade" => $this->faker->numberBetween(1, 100)
        ];
    }
}

<?php
namespace Database\Factories;

use App\Enums\UnitSiEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'material_name'           => fake()->sentence,
            'purchase_price'          => fake()->numberBetween(1, 50000),
            'sale_price'              => fake()->numberBetween(1, 900000),
            'margin'                  => fake()->numberBetween(1, 5),
            'unit_si'                 => UnitSiEnum::KILO,
            'material_code'           => fake()->currencyCode(),
        ];
    }
}

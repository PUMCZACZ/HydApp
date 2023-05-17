<?php
namespace Database\Factories;

use App\Enums\UnitSiEnum;
use App\Models\UnitSi;
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
            'purchase_price'          => fake()->numberBetween(1, 5000),
            'sale_price'              => fake()->numberBetween(1, 8000),
            'margin'                  => fake()->numberBetween(1, 5),
            'unit_si'                 => $this->for(UnitSi::factory()),
            'material_code'           => fake()->currencyCode(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->words(2, true)),
            'category_id' => Category::inRandomOrder()->first()?->id,
            'image' => $this->generateAndStoreImage(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 0.50, 100),
            'unit' => $this->faker->randomElement(['pcs', 'package', 'kg', 'liter']),
            'vat' => $this->faker->randomElement([0, 10, 20]),
            'active' => $this->faker->boolean(90),
        ];
    }

    private function generateAndStoreImage(): ?string
    {
        $directory = 'products';
        $fileName = Str::uuid() . '.jpg';
        $imageUrl = "https://picsum.photos/seed/{$fileName}/640/480";

        try {
            $imageContent = file_get_contents($imageUrl);
            Storage::disk('public')->put("{$directory}/{$fileName}", $imageContent);
            return "{$directory}/{$fileName}";
        } catch (\Exception $e) {
            return null;
        }
    }
}

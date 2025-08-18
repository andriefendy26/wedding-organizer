<?php

namespace Database\Factories;

use App\Models\InstagramPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstagramPost>
 */
class InstagramPostFactory extends Factory
{
    protected $model = InstagramPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Dekorasi Premium Eksklusif',
            'Paket Wedding Mewah',
            'Dekorasi Garden Party',
            'Konsep Minimalis Modern',
            'Wedding Tradisional Jawa',
            'Intimate Wedding Setup',
            'Luxury Reception Decor',
            'Outdoor Wedding Paradise',
            'Rustic Wedding Theme',
            'Elegant Indoor Setup'
        ];

        return [
            'title' => $this->faker->randomElement($titles),
            'href' => 'https://www.instagram.com/3rasa.weddingneventorganizer/reel/' . $this->faker->regexify('[A-Za-z0-9]{11}') . '/',
            'img' => 'storage/content/wedding' . $this->faker->numberBetween(1, 10) . '.jpg',
            'like' => $this->faker->numberBetween(0, 500),
            'comment' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(85), // 85% chance of being active
        ];
    }

    /**
     * Indicate that the post is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }

    /**
     * Indicate that the post is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the post has high engagement.
     */
    public function highEngagement(): static
    {
        return $this->state(fn (array $attributes) => [
            'like' => $this->faker->numberBetween(200, 1000),
            'comment' => $this->faker->numberBetween(50, 200),
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\InstagramPost;
use Illuminate\Database\Seeder;

class InstagramPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the exact posts from your array
        $posts = [
            [
                'title' => 'Dekorasi Premium Eksklusif',
                'href' => 'https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/',
                'img' => 'storage/content/wedding01.jpg',
                'like' => 0,
                'comment' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Dekorasi Premium Eksklusif',
                'href' => 'https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/',
                'img' => 'storage/content/wedding01.jpg',
                'like' => 0,
                'comment' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Dekorasi Premium Eksklusif',
                'href' => 'https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/',
                'img' => 'storage/content/wedding01.jpg',
                'like' => 0,
                'comment' => 0,
                'is_active' => true,
            ],
            [
                'title' => 'Dekorasi Premium Eksklusif',
                'href' => 'https://www.instagram.com/3rasa.weddingneventorganizer/reel/C65NEgnLMNR/',
                'img' => 'storage/content/wedding01.jpg',
                'like' => 0,
                'comment' => 0,
                'is_active' => true,
            ],
        ];

        foreach ($posts as $post) {
            InstagramPost::create($post);
        }

        // Create additional sample posts using factory
        InstagramPost::factory()->count(10)->create();
        
        // Create some high engagement posts
        InstagramPost::factory()->count(5)->highEngagement()->create();
        
        // Create some inactive posts
        InstagramPost::factory()->count(3)->inactive()->create();
    }
}
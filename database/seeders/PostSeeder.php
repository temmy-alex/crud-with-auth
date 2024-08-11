<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Artikel 1',
            'description' => 'Artikel 1',
            'image' => '/img/no-image.png',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Artikel 2',
            'description' => 'Artikel 2',
            'image' => '/img/no-image.png',
            'category_id' => 2,
            'user_id' => 1
        ]);


        Post::create([
            'title' => 'Artikel 3',
            'description' => 'Artikel 2',
            'image' => '/img/no-image.png',
            'category_id' => 3,
            'user_id' => 1
        ]);
    }
}

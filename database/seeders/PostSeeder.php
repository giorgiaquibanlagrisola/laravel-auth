<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $title = fake()->sentence();
            $slug = Str::slug($title);
            $post->title = $title;
            $post->slug = $slug;
            $post->content = fake()->paragraph();
            $post->save();

            // OPPURE

            $titleForMassAssignment = fake()->sentence();
            $slugForMassAssignment = Str::slug($titleForMassAssignment);
            $postWithMassAssignment = Post::create([
                'title' => $titleForMassAssignment,
                'slug' => $slugForMassAssignment,
                'content' => fake()->paragraph(),
            ]);
        }
    }
}

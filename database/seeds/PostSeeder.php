<?php

use Illuminate\Database\Seeder;
use App\Models\Eloquent\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Post::class, 10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class IndexPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('index_page')->insert([
        	'var_name' => 'title',
        	'var_value' => 'Blog | Home'
        ]);

        DB::table('index_page')->insert([
        	'var_name' => 'caption_page',
        	'var_value' => 'My blog'
        ]);

        DB::table('index_page')->insert([
        	'var_name' => 'description_page',
        	'var_value' => 'Welcome to my blog'
        ]);

        DB::table('index_page')->insert([
        	'var_name' => 'background_img',
        	'var_value' => 'img/home-bg.jpg'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class PostPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_page')->insert([
        	'var_name' => 'title',
        	'var_value' => 'Blog | Post'
        ]);        

        DB::table('post_page')->insert([
        	'var_name' => 'background_img',
        	'var_value' => 'img/post-bg.jpg'
        ]);
    }
}

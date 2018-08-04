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

        $row = DB::table('pages')->where('page_name', '=', 'index')->first();
        $page_id = $row->id;

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'title',
        	'var_value' => 'Blog | Home',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'caption_page',
        	'var_value' => 'My blog',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'description_page',
        	'var_value' => 'Welcome to my blog',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'background_img',
        	'var_value' => 'img/home-bg.jpg',
            'var_type' => 'file'
        ]);
    }
}

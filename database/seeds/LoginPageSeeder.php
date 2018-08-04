<?php

use Illuminate\Database\Seeder;

class LoginPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $row = DB::table('pages')->where('page_name', '=', 'login')->first();
        $page_id = $row->id;

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'title',
        	'var_value' => 'Blog | Login',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'caption_page',
        	'var_value' => 'Login',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'description_page',
        	'var_value' => 'On this page you can sing in website',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'background_img',
        	'var_value' => 'img/contact-bg.jpg',
            'var_type' => 'file'
        ]);
    }
}

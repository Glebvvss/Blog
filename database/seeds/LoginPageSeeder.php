<?php

use Illuminate\Database\Seeder;

class LoginPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('login_page')->insert([
        	'var_name' => 'title',
        	'var_value' => 'Blog | Login'
        ]);

        DB::table('login_page')->insert([
        	'var_name' => 'caption_page',
        	'var_value' => 'Login'
        ]);

        DB::table('login_page')->insert([
        	'var_name' => 'description_page',
        	'var_value' => 'On this page you can sing in website'
        ]);

        DB::table('login_page')->insert([
        	'var_name' => 'background_img',
        	'var_value' => 'img/contact-bg.jpg'
        ]);
    }
}

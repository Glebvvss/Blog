<?php

use Illuminate\Database\Seeder;

class RegistrationPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registration_page')->insert([
        	'var_name' => 'title',
        	'var_value' => 'Blog | Registration'
        ]);

        DB::table('registration_page')->insert([
        	'var_name' => 'caption_page',
        	'var_value' => 'Registration'
        ]);

        DB::table('registration_page')->insert([
        	'var_name' => 'description_page',
        	'var_value' => 'If you are still not with us, then join us'
        ]);

        DB::table('registration_page')->insert([
        	'var_name' => 'background_img',
        	'var_value' => 'img/home-bg.jpg'
        ]);
    }
}

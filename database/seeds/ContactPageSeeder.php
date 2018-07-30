<?php

use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_page')->insert([
        	'var_name' => 'title',
        	'var_value' => 'Blog | Contact'
        ]);

        DB::table('contact_page')->insert([
        	'var_name' => 'caption_page',
        	'var_value' => 'Contact Us'
        ]);

        DB::table('contact_page')->insert([
        	'var_name' => 'description_page',
        	'var_value' => 'If you want to contact us, then fill out the form'
        ]);

        DB::table('contact_page')->insert([
        	'var_name' => 'background_img',
        	'var_value' => 'img/contact-bg.jpg'
        ]);
    }
}

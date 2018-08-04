<?php

use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = DB::table('pages')->where('page_name', '=', 'about')->first();
        $page_id = $row->id;

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'title',
        	'var_value' => 'Blog | About',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'caption_page',
        	'var_value' => 'About Us',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'description_page',
        	'var_value' => 'On this page you can find all information about us',
            'var_type' => 'text'
        ]);

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'background_img',
        	'var_value' => 'img/about-bg.jpg',
            'var_type' => 'file'
        ]);
        
        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
            'var_name' => 'about_us',
            'var_value' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>',
      'var_type' => 'text'
        ]);
    }
}

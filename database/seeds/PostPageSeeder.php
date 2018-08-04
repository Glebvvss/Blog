<?php

use Illuminate\Database\Seeder;

class PostPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $row = DB::table('pages')->where('page_name', '=', 'single-post')->first();
        $page_id = $row->id;

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'title',
        	'var_value' => 'Blog | Post',
            'var_type' => 'text'
        ]);        

        DB::table('tpl_vars_per_page')->insert([
            'page_id' => $page_id,
        	'var_name' => 'background_img',
        	'var_value' => 'img/post-bg.jpg',
            'var_type' => 'file'
        ]);
    }
}

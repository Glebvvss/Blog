<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $pageList = [
            'index',
            'about',
            'contact',
            'login',
            'registration',
            'single-post'
        ];

        foreach( $pageList as $pageName ) {
            DB::table('pages')->insert([
                'page_name' => $pageName
            ]);
        }
    }
}

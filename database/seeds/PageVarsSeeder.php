<?php

use Illuminate\Database\Seeder;

class PageVarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call([
        	AboutPageSeeder::class,
        	ContactPageSeeder::class,
        	IndexPageSeeder::class,
        	LoginPageSeeder::class,
        	RegistrationPageSeeder::class,
        	PostPageSeeder::class,
        ]);
    }
}

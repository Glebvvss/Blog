<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	ContactPageSeeder::class,
        	IndexPageSeeder::class,
        	AboutPageSeeder::class,
            LoginPageSeeder::class,
            RegistrationPageSeeder::class,
        ]);
    }
}

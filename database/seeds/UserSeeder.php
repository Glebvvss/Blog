<?php

use Illuminate\Database\Seeder;
use App\Models\Eloquent\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'glebvvss@ukr.net';
        $user->password = bcrypt('admin');
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name = 'user';
        $user->email = 'glebvs@ukr.net';
        $user->password = bcrypt('user');
        $user->role_id = 2;
        $user->save();
    }
}

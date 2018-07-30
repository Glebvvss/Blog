<?php

use Illuminate\Database\Seeder;
use App\Models\Eloquent\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menuList = [
            [
                'menu_point' => 'Home'
                'route' => '/'
            ],
            [
                'menu_point' => 'About'
                'route' => '/about'
            ],
            [
                'menu_point' => 'Contact'
                'route' => '/contact'
            ],
            [
                'menu_point' => 'Login'
                'route' => '/login'
            ],
            [
                'menu_point' => 'Logout'
                'route' => '/logout-action'
            ],
            [
                'menu_point' => 'Registration'
                'route' => '/registration'
            ]
        ];

        foreach ( $menuList as $menuPoint ) {
            $menu = new Menu();
            $menu->menu_point = $menuPoint['manu_point'];
            $menu->route = $menuPoint['route'];
            $menu->status = 1;
            $menu->save();
        }

    }
}

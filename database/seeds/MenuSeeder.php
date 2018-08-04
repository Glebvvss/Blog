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
                'menu_point' => 'Home',
                'route' => '/',
                'position' => 1
            ],
            [
                'menu_point' => 'About',
                'route' => '/about',
                'position' => 2
            ],
            [
                'menu_point' => 'Contact',
                'route' => '/contact',
                'position' => 3
            ],
            [
                'menu_point' => 'Login',
                'route' => '/login',
                'position' => 4
            ],
            [
                'menu_point' => 'Logout',
                'route' => '/logout-action',
                'position' => 4
            ],
            [
                'menu_point' => 'Registration',
                'route' => '/registration',
                'position' => 5
            ]
        ];

        foreach ( $menuList as $menuPoint ) {
            $menu = new Menu();
            $menu->menu_point = $menuPoint['menu_point'];
            $menu->route = $menuPoint['route'];
            $menu->status = 1;
            $menu->position = $menuPoint['position'];
            $menu->save();
        }

    }
}

<?php

namespace Database\Seeders;

use App\Models\MovieType;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        MovieType::create([

            'type' => 'watched'
        ]);

        MovieType::create(
            [
                'type' => 'not finished'
            ],

        );

        MovieType::create(
            [
                'type' => 'want to watch'
            ]
        );

        MovieType::create(
            [
                'type' => 'watching'
            ]

        );
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);
        User::create([
            'name' => 'Dragana Markovic',
            'email' => 'dragana@gmail.com',
            'password' => bcrypt('dragana')
        ]);
        User::create([
            'name' => 'Andjela Zoric',
            'email' => 'andjela@gmail.com',
            'password' => bcrypt('andjela')
        ]);

        User::create([
            'name' => 'Marija Vujanovic',
            'email' => 'marija@gmail.com',
            'password' => bcrypt('marija')
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::create([
            'name' => 'Gorilas',
            'lastname' => 'Online',
            'second_lastname' => 'Admin',
            'address' => $faker->text(400),
            'state' => $faker->text(75),
            'municipality' => $faker->text(75),
            'city' => $faker->text(75),
            'country' => $faker->text(75),
            'email' => 'info@appsgorilasonline.com',
            'password' => bcrypt('admin'),
            'phone' => $faker->randomNumber(),
            'restaurant_name' => $faker->text(50),
            'description' => $faker->randomHtml(),
            'cover' => 'nocover.jpg',
            'logo' => 'nologo.jpg',
            'type_id' => 1,
        ]);

        User::create([
            'name' => 'Fernando',
            'lastname' => 'Cárdenas',
            'second_lastname' => 'González',
            'address' => $faker->text(400),
            'state' => $faker->text(75),
            'municipality' => $faker->text(75),
            'city' => $faker->text(75),
            'country' => $faker->text(75),
            'email' => 'hola@ferca.dev',
            'password' => bcrypt('normal'),
            'phone' => $faker->randomNumber(),
            'restaurant_name' => $faker->text(50),
            'description' => $faker->randomHtml(),
            'cover' => 'nocover.jpg',
            'logo' => 'nologo.jpg',
            'type_id' => 2,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = max((int)$this->command->ask('How many users would you like to create', 20), 1);
        User::factory($userCount)->create();
        User::factory()->create(
            ['email' => 'markovukotic32@gmail.com',
            'name' => 'Marko Vukotic',
            'password' => bcrypt('marko123'),
            'is_admin' => true,
            ]
        );
    }
}

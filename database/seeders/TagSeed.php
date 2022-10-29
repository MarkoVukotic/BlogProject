<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class TagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $tags = (int)$this->command->ask('How many tags would you like to create', 5);
         Tag::factory($tags)->create();
    }
}

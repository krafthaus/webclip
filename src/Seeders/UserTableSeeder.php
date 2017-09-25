<?php

namespace KraftHaus\WebClip\Seeders;

use Illuminate\Database\Seeder;
use KraftHaus\WebClip\Eloquent\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@domain.com',
            'password' => bcrypt('demodemo'),
        ]);
    }
}

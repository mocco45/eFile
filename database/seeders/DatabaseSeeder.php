<?php

namespace Database\Seeders;

use App\Models\Files;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Files::factory(100)->create();

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com',
            'photo' => 'admin.jpg',
            'phone' => 744611319,
            'role_id' => 1,
            'password' => bcrypt('secret')
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}

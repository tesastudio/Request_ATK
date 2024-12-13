<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\ContactsTableSeeder;
use Database\Seeders\DeptSeed;
use Database\Seeders\GoodsSeed;
use Database\Seeders\StatusSeed;
use Database\Seeders\UserSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(ContactsTableSeeder::class);
        $this->call(DeptSeed::class);
        $this->call(GoodsSeed::class);
        $this->call(UserSeed::class);
        $this->call(StatusSeed::class);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

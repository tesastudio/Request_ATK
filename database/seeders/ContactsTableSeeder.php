<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // factory(Contact::class, 10)->create();
        Contact::factory(10)->create();
    }
}

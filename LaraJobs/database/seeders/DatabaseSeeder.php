<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Listing::create([
                'user_id' => '1',
                'title' => 'Laravel Senior Developer',
                'tags' => 'laravel, javascript',
                'company' => 'Acme Corp',
                'location' => 'Boston, MA',
                'email' => 'email1@email.com',
                'website' => 'https://www.acme.com',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
            
        ]);

        Listing::create([
        'user_id' => '1',
        'title' => 'Full-Stack Engineer',
        'tags' => 'laravel, backend ,api',
        'company' => 'Stark Industries',
        'location' => 'New York, NY',
        'email' => 'email2@email.com',
        'website' => 'https://www.starkindustries.com',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            Tarsashaz::class,
            Alberlet::class,
            Kozgyules::class,
            Napirendi_pont::class,
            Tulajdonos::class,
            Resztvevo::class,
            Felszolalas::class,
            Szavazat::class,
        ]);

    }
}

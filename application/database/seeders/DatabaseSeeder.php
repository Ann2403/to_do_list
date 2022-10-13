<?php

namespace Database\Seeders;

use App\Models\Card\Entity\Card;
use App\Models\User\Entity\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(3)
            ->has(Card::factory()->count(100))
            ->create();
    }
}

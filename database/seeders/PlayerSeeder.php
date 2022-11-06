<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = Position::all();
        foreach ($positions as $position) {
            Player::factory(5)->create([
                'position_id' => $position->id
            ]);
        }
    }
}
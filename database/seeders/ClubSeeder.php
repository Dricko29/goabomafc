<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::create([
            'nama' => 'Goa Boma Football Club',
            'slug' => 'gbfc',
            'no_tlp' => '081254504398',
            'email' => 'goabomafootballclub@gmail.com',
            'alamat' => 'Jl. Raya goa boma blok A/B',
            'tahun_terbentuk' => '2004-01-01',           
        ]);
    }
}
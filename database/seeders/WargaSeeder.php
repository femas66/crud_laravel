<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $jenis_kelamin = ['L', 'P'];
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('warga')->insert([
                'nama' => $faker->name(),
                'nik' => $faker->unique()->randomNumber(9),
                'jenis_kelamin' => $faker->randomElement($jenis_kelamin),
                'tanggal_lahir' => $faker->date(),
                'foto' => 'fotoseeder.jpg'
            ]);
        }
    }
}

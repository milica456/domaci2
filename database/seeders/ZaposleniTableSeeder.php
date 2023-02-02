<?php

namespace Database\Seeders;

use App\Models\Zaposleni;
use Illuminate\Database\Seeder;

class ZaposleniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i < 30; $i++) {

            Zaposleni::create([
                'ime' => $faker->firstName(),
                'prezime' => $faker->lastName(),
                'pozicijaID' => $faker->numberBetween(1,9), 
                'plata' => $faker->numberBetween(650, 4000)
            ]);
        }
    }
}

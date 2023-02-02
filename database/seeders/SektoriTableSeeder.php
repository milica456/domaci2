<?php

namespace Database\Seeders;

use App\Models\Sektor;
use Illuminate\Database\Seeder;

class SektoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sektor::create([
            'sektor' => 'HR',
            'rukovodilac' => 'Anna Jones'
        ]);
        
        Sektor::create([
            'sektor' => 'PR',
            'rukovodilac' => 'Tim Davies'
        ]);

        Sektor::create([
            'sektor' => 'CR',
            'rukovodilac' => 'Sarah Addams'
        ]);

        Sektor::create([
            'sektor' => 'IT',
            'rukovodilac' => 'Nina James'
        ]);
    
    }
}

<?php

namespace Database\Seeders;

use App\Models\Pozicija;
use Illuminate\Database\Seeder;

class PozicijeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pozicija::create([
            'pozicija' => 'HR Manager',
            'sektorID' => '1'
        ]);
        
        Pozicija::create([
            'pozicija' => 'HR Intern',
            'sektorID' => '1'
        ]);

        Pozicija::create([
            'pozicija' => 'PR Manager',
            'sektorID' => '2'
        ]);

        Pozicija::create([
            'pozicija' => 'PR Intern',
            'sektorID' => '2'
        ]);

        Pozicija::create([
            'pozicija' => 'CR Manager',
            'sektorID' => '3'
        ]);

        Pozicija::create([
            'pozicija' => 'CR Intern',
            'sektorID' => '3'
        ]);
        
        Pozicija::create([
            'pozicija' => 'IT Manager',
            'sektorID' => '4'
        ]);

        Pozicija::create([
            'pozicija' => 'Designer',
            'sektorID' => '4'
        ]);

        Pozicija::create([
            'pozicija' => 'Consultant',
            'sektorID' => '4'
        ]);

        Pozicija::create([
            'pozicija' => 'Programmer',
            'sektorID' => '4'
        ]);


    }
}

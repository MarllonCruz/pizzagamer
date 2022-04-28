<?php

namespace Database\Seeders;

use App\Models\Highlight;
use Illuminate\Database\Seeder;

class HighlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for ($i=1; $i <= 4 ; $i++) { 
            Highlight::create([
                'position' => 'small',
                'title' => 'Pequeno'
            ]);
        }

        Highlight::create([
            'position' => 'small diff',
            'title' => 'Pequeno(p)'
        ]);

        Highlight::create([
            'position' => 'medium',
            'title' => 'Médio'
        ]);

        Highlight::create([
            'position' => 'large',
            'title' => 'Grande'
        ]);
    }
}

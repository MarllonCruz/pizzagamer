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
        for ($i=1; $i <= 5 ; $i++) { 
            Highlight::create([
                'position' => 'small'
            ]);
        }
        Highlight::create([
            'position' => 'medium'
        ]);

        Highlight::create([
            'position' => 'large'
        ]);
    }
}

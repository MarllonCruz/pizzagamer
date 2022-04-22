<?php

namespace Database\Seeders;

use App\Models\Slide;
use App\Models\Article;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10 ; $i++) { 
            Slide::create([
                'order' => $i
            ]);
        }
    }
}

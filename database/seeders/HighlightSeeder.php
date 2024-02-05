<?php

namespace Database\Seeders;

use App\Models\Article;
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
        for ($i = 1; $i <= 4; $i++) {
            Highlight::create([
                'position' => 'small',
                'title' => 'Pequeno',
                'article_id' =>  Article::inRandomOrder()->whereNotNull('category_id')->first()->getKey()
            ]);
        }

        Highlight::create([
            'position' => 'small diff',
            'title' => 'Pequeno(p)',
            'article_id' =>  Article::inRandomOrder()->whereNotNull('category_id')->first()->getKey()
        ]);

        Highlight::create([
            'position' => 'medium',
            'title' => 'Médio',
            'article_id' =>  Article::inRandomOrder()->whereNotNull('category_id')->first()->getKey()
        ]);

        Highlight::create([
            'position' => 'large',
            'title' => 'Grande',
            'article_id' =>  Article::inRandomOrder()->whereNotNull('category_id')->first()->getKey()
        ]);
    }
}

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
        $indexSlide = 1;
        $limitCountSlide = 10;

        $articles = Article::all();

        foreach ($articles as $article) {
            if ($indexSlide > $limitCountSlide) {
                break;
            }

            Slide::create([
                'order' => $indexSlide,
                'article_id' => $article->getKey()
            ]);

            $indexSlide++;
        }
    }
}

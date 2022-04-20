<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        date_default_timezone_set('America/Sao_Paulo');

        $user     = User::factory()->create();  
        $category = Category::factory()->create();

        // clear files image no path storage
        $file = new Filesystem;
        $file->cleanDirectory('storage/app/public/article/factory');

        for ($i=0; $i < 15; $i++) { 
            $title = $faker->sentence(6);
            $content = "<h3>{$faker->sentence(6)}</h3><p></p>
                        <p>{$faker->sentence(10)}</p><p></p>
                        <h5>{$faker->sentence(4)}</h5>
                        <p>{$faker->sentence(20)}</p><p></p>
                        <p>{$faker->sentence(30)}</p>";
            
            $cover = $faker->image(storage_path('app\public\article\factory'), 620, 400, null, false);

            Article::create([
                'user_id'     => $user->id,
                'category_id' => $category->id,
                'title'       => $title,
                'uri'         => Str::slug($title, '-'),
                'description' => $faker->sentence(10),
                'content'     => $content,
                'cover'       => 'article/factory/' . $cover,
                'views'       => 0,
                'type'        => 'post',
                'status'      => 'active',
                'opening_at'  => date('Y-m-d H:i:s')
            ]);
        }
    }
}
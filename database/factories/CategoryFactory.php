<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => 'Evento',
            'description' => $this->faker->paragraph(),
            'type'        => 'post',
            'uri'         => Str::slug('Evento' , '-')
        ];
    }
}

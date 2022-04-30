<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{   
    protected $model = User::class;

    /**
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => 'ghostgamer@gmail.com',
            'password' => Hash::make('123456789'),
            'level' => '10',
            'genre' => null,
            'datebirth' => $this->faker->date(),
            'photo' => 'media/profile/default.jpg',
            'document' => $this->faker->ean8()
        ];
    }
}

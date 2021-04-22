<?php

namespace Database\Factories;

use App\Models\Auther;
use App\Models\Profile;
use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class AutherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Auther::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_name' => $this->faker->name 
        ];
    }

    public function addProfile() {
        return $this->afterCreating(function (Auther $auther) {
            $auther->profile()->save(Profile::factory(Profile::class)->make());
        });
    }    

    //$users = User::factory()->times(5)->subscribed()->create();
}

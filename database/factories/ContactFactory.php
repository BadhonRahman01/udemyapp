<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'first_name' =>  $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'phone' => $this->faker->phone(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'user_id' => User::factory(),
        ];
    }
}

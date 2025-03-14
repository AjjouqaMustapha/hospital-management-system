<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Section;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'appointments'=> $this->faker->randomElement(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']),
            'email'=> $this->faker->unique()->safeEmail,
            'email_verefied_at'=> now(),
            'password'=> Hash::make('password'),
            'section_id'=>  Section::all()->random()->id,
            'phone'=> $this->faker->phoneNumber,
            'price'=>$this->faker->biasednumberBetween(1, 10) * 100,

        ];
    }
}
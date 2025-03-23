<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement(["General Surgery Department",'Internal Medicine Department','Pediatrics Department','Obstetrics and Gynecology Department','Orthopedics and Joints Department',
                                                        'Cardiology and Vascular Department','Dermatology and Venereology Department','Otolaryngology (ENT) Department','Ophthalmology Department','Urology Department',
                                                        'Neurosurgery Department','Plastic Surgery Department','Dental Department','Psychiatry Department','Physical Therapy Department','Nutrition Department','Radiology Department',
        ]),
            'description'=> $this->faker->paragraph(),
        ];
    }
}

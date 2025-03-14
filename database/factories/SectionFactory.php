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
            'name' => $this->faker->unique()->randomElement(["قسم الجراحة العامة",'قسم الأمراض الباطنية','قسم طب الأطفال','قسم النساء والتوليد','قسم العظام والمفاصل',
                                                        'قسم أمراض القلب والأوعية الدموية','قسم الجلدية والتناسلية','قسم الأنف والأذن والحنجرة','قسم طب العيون',
        ]),
            'description'=> $this->faker->paragraph(),
        ];
    }
}

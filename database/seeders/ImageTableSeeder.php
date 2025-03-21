<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{

    protected $model = Image::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::factory()->count(30)->create();
    }
}

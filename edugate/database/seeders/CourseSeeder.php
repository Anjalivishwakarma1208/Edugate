<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker\Factory as Faker;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        foreach (range(1, 50) as $index) {
            Course::create([
                'course_name' => $faker->sentence(3),
                'description' => $faker->paragraph(4),
                'image' => 'uploads/course' . $index . '.jpg', // Assuming images are stored in a specific directory
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_on' => $faker->dateTimeThisYear(),
                'updated_on' => $faker->dateTimeThisYear(),
                'created_by' => $faker->name,
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear()
            ]);
    }
}
}
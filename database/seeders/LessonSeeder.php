<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Lesson::Create([
            'id' => 1,
            'code' => $faker->uuid(),
            'title' => 'RUMBA',
            'description' => $faker->sentence(),
        ]);

        Lesson::Create([
            'id' => 2,
            'code' => $faker->uuid(),
            'title' => 'YOGA',
            'description' => $faker->sentence(),
        ]);

        Lesson::Create([
            'id' => 3,
            'code' => $faker->uuid(),
            'title' => 'CROSSTECH',
            'description' => $faker->sentence(),
        ]);


        Lesson::Create([
            'id' => 4,
            'code' => $faker->uuid(),
            'title' => 'COMBAT',
            'description' => $faker->sentence(),
        ]);

        Lesson::Create([
            'id' => 5,
            'code' => $faker->uuid(),
            'title' => 'HIIT',
            'description' => $faker->sentence(),
        ]);

        Lesson::Create([
            'id' => 6,
            'code' => $faker->uuid(),
            'title' => 'STEP',
            'description' => $faker->sentence(),
        ]);

        Lesson::Create([
            'id' => 7,
            'code' => $faker->uuid(),
            'title' => 'CYCLING',
            'description' => $faker->sentence(),
        ]);

        Lesson::Create([
            'id' => 8,
            'code' => $faker->uuid(),
            'title' => 'PILATES',
            'description' => $faker->sentence(),
        ]);


        Lesson::Create([
            'id' => 9,
            'code' => $faker->uuid(),
            'title' => 'SUPERABS',
            'description' => $faker->sentence(),
        ]);
    }
}

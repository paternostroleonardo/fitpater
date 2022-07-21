<?php

namespace Database\Factories;

use App\Models\Calendar;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $calendar = Calendar::select('id')->get();
        {
            return [
                'code' => $this->faker->uuid(),
                'title' => $this->faker->randomElement(Lesson::TYPES),
                'description' => $this->faker->sentence(),
                'calendar_id' => $calendar->random()->id
            ];
        }
    }
}

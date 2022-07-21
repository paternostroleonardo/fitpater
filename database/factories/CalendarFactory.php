<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Lesson;

class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lesson = Lesson::select('id')->get();
        $start = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('0 week', '+2 week')->getTimestamp());
            return [
                'start_date' => $start->toDateTimeString(),
                'end_date' => $start->addHours($this->faker->numberBetween(1, 3)),
                'lesson_id' => $lesson->random()->id
            ];
        }
}


<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CalendarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('0 week', '+2 week')->getTimestamp());
        return [
            'start_date' => $start->toDateTimeString(),
            'end_date' => $start->addHours($this->faker->numberBetween(1, 3))
        ];
    }
}

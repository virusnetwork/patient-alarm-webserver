<?php

namespace Database\Factories;

use App\Models\Alarm;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlarmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alarm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}

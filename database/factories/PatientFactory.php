<?php

namespace Database\Factories;

use App\Models\Bed;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'condition' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'bed_id' => Bed::inRandomOrder()->first()->id,
        ];
    }
}

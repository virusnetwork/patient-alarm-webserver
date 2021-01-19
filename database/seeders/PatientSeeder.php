<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $a = new Patient();
        $a->name = "Miles Singleton";
        $a->condition = "Pancolitis";
        $a->bed_id = 1;
        $a->risk_level = 1;
        $a->save();

        $patients = Patient::factory()->count(90)->create();
    }
}

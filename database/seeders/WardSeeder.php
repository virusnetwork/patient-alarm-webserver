<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Ward();
        $a-> name = "ICU";
        $a->save();

        $b = new Ward();
        $b-> name = "A&E";
        $b->save();

        $c = new Ward();
        $c-> name = "General Surgery";
        $c->save();

        $d = new Ward();
        $d-> name = "Urology";
        $d->save();

        $e = new Ward();
        $e-> name = "Cardiology";
        $e->save();
    }
}

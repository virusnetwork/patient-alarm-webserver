<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('name');
            $table->string('condition');
            $table->foreignId('bed_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->enum('risk_level',[1,2,3,4,5]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('patient_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('bed_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('ward_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('reason');
            $table->bigInteger('timeOfAlarm')->default(now()->timestamp);
            $table->bigInteger('timeOfAlarmOff')->nullable();
            $table->string('nurse')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alarms');
    }
}
////
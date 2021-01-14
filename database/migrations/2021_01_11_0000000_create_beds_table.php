<?php

use App\Models\Bed;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('room_id')->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('bed_number')->default(0);
        });
    }

    function bed_num()
    {
        $this->bed_number = Bed::where('room_id',$this->room_id)->count()+1;
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beds');
    }
}

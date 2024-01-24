<?php

use App\Models\Participant;
use App\Models\Sessionable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Participant::class);
            $table->foreignIdFor(Sessionable::class);
            $table->dateTime('date_first_view');
            $table->dateTime('date_last_view')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_mentor')->default(false);
            $table->smallInteger('score')->default(0);
            $table->dateTime('date_get_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workouts');
    }
};

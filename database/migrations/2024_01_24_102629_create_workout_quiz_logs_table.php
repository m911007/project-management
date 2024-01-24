<?php

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Workout;
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
        Schema::create('workout_quiz_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Workout::class);
            $table->foreignIdFor(Quiz::class);
            $table->foreignIdFor(Question::class);
            $table->json('answer')->nullable();
            $table->boolean('is_mentor')->default(false);
            $table->smallInteger('score')->nullable();
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
        Schema::dropIfExists('workout_quiz_logs');
    }
};

<?php

use App\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Question;

return new class extends Migration
{
    public function up()
    {
        Schema::create('question_quiz', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quiz::class);
            $table->foreignIdFor(Question::class);
            $table->smallInteger('order')->default(1);
            $table->smallInteger('score')->default(1);
            $table->softDeletes();
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
        //
    }
};

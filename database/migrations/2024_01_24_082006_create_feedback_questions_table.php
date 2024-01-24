<?php

use App\Models\Feedback;
use App\Models\Question;
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
        Schema::create('feedback_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Feedback::class);
            $table->foreignIdFor(Question::class);
            $table->smallInteger('order')->default(1);
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
        Schema::dropIfExists('feedback_questions');
    }
};

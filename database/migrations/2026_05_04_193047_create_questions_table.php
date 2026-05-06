<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->string('question_type');
            $table->integer('marks')->default(1);
            $table->string('media_path')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
            $table->text('correct_text')->nullable();
            $table->integer('correct_number')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
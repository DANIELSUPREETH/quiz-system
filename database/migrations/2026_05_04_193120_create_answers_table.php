<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('answers', function (Blueprint $table) {
        $table->id();
        $table->foreignId('attempt_id')->constrained()->onDelete('cascade');
        $table->foreignId('question_id')->constrained()->onDelete('cascade');
        $table->text('answer'); // flexible for all types
        $table->timestamps();
    });
    }
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('fa_title');
            $table->string('en_title')->nullable();
            $table->text('description');
            $table->string('poster');
            $table->string('wallpaper')->nullable();
            $table->decimal('imdb' , 2 ,1);
            $table->string('ages');
            $table->string('year_construction');
            $table->string('country');
            $table->string('director');
            $table->string('producer')->nullable()->comment('تهیه کننده');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

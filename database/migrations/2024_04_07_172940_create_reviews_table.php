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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();


            $table->text('review');
            $table->unsignedTinyInteger('rating'); // range of 0 (lowest) to 5 (highest)

            $table->timestamps();

//            LONGHAND FOREIGN KEY
//            $table->unsignedBigInteger('book_id');
//            $table->foreign('book_id')
//                ->references('id')
//                ->on('books')
//                ->onDelete('cascade');


//          SHORTHAND FOREIGN KEY - much nicer to write when using the defaults, the long hand way does provide more flexibility in which column you access
            $table->foreignId('book_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::create('sub_catagories', function (Blueprint $table) {
            $table->id();
             //jay kono somoy foreignid use korla singular dita hobe
            // $table->foreignId('category_id')
            //karo informatin rakhta caila constrained dita hobe
            //$table->foreignId('category_id')->constrained();
            //karo information na rakhta caila onupdate,ondelete use korta hobe
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->uniqid();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_catagories');
    }
};

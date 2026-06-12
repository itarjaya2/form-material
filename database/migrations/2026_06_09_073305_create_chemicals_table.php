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
        Schema::create('chemicals', function (Blueprint $table) {
             $table->id();
            $table->string('code')->unique();
            $table->string('item'); //nama item
            $table->string('material');
            $table->text('specs')->nullable();
            $table->decimal('qty', 12, 4)->default(0);
            $table->text('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chemicals');
    }
};

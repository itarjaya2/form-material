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
        Schema::create('bahan_tambahans', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('item');
            $table->string('material')->nullable();
            $table->string('specs')->nullable();
            $table->string('panjang')->nullable();
            $table->string('lebar')->nullable();
            $table->string('tinggi')->nullable();
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
        Schema::dropIfExists('bahan_tambahans');
    }
};

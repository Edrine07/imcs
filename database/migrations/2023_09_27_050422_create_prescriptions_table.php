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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->references('id')->on('appointments')->constrained()->onDelete('cascade');
            $table->string('bp');
            $table->string('cr');
            $table->string('rr')->nullable();
            $table->string('t');
            $table->string('ht')->nullable();
            $table->string('wt');
            $table->string('symptoms');
            $table->string('diagnosis');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};

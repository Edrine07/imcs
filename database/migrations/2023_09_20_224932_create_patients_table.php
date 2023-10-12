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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_last_name')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_contact')->nullable();
            $table->string('patient_address')->nullable();

            $table->string('patient_bp')->nullable();
            $table->string('patient_cr')->nullable();
            $table->string('patient_rr')->nullable();
            $table->string('patient_t')->nullable();
            $table->string('patient_ht')->nullable();
            $table->string('patient_wt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

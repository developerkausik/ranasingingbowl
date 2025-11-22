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
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('business_name')->nullable();
            $table->string('experience')->nullable();
            $table->string('location')->nullable();
            $table->string('investment')->nullable();
            $table->text('reason')->nullable();
            $table->string('capital')->nullable();
            $table->string('source_of_funds')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->string('expected_start_date')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchises');
    }
};

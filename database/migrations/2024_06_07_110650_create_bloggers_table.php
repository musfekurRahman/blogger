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
        Schema::create('bloggers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unique()->index('user_id_index');
            $table->string('slug',250)->unique()->index('slug_index');
            $table->string('title',200);
            $table->text('description')->nullable();
            $table->enum('status',['ACTIVE','INACTIVE'])->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloggers');
    }
};

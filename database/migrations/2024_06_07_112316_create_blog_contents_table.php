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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blogger_id');
            $table->string('headline','250');
            $table->text('content');
            $table->integer('priority')->default(0);
            $table->json('categories')->comment('selected categories');
            $table->integer('total_comments')->default(0);
            $table->integer('total_hits')->default(0);
            $table->integer('total_hosts')->default(0);
            $table->string('author_name','100');
            $table->tinyInteger('is_pinned')->default(0);
            $table->enum('status',['DRAFT','PUBLISH','PENDING'])->default('DRAFT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->uuid('post_uuid');
            $table->uuid('tag_uuid');
            $table->timestamps();
            $table->foreign('post_uuid')->references('uuid')->on('posts')->onDelete('cascade');
            $table->foreign('tag_uuid')->references('uuid')->on('tags')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};

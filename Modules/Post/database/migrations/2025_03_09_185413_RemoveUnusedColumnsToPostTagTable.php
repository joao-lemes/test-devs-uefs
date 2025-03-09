<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropColumn(['uuid', 'created_at', 'updated_at']);
        });
    }

    public function down(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->timestamps();
        });
    }
};

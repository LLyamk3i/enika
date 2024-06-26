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
        Schema::create('dashboard_access_keys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actor_id')->constrained('ministries');
            $table->string('actor_type');
            $table->string('contraint_acess');
            $table->string('value');
            $table->string('label');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_access_keys');
    }
};

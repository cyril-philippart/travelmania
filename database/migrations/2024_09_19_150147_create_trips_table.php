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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::table('steps', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Trips::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('steps', function (Blueprint $table) {
            $table->dropForeign(['trips_id']);
        });
        Schema::dropIfExists('trips');
    }
};

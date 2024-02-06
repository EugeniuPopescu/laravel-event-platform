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
        Schema::create('event_tag', function (Blueprint $table) {
            $table->id();
            // $table->foreignId("event_id")->constrained()->cascadeOnDelete();
            // $table->foreignId("tag_id")->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger("event_id")->nullable();
            $table->foreign("event_id")->references("id")->on("events")->cascadeOnDelete();

            $table->unsignedBigInteger("tag_id")->nullable();
            $table->foreign("tag_id")->references("id")->on("tags")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. 
     */
    public function down(): void
    {
        Schema::dropIfExists('event_tag');
    }
};

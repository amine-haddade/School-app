<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('sessions_events', function (Blueprint $table) {
        $table->id();
        $table->string('day');
        $table->time('start');
        $table->time('end');
        $table->string('class');
        $table->foreignId('details_id')->constrained('session_details')->onDelete('cascade');
        $table->foreignId('timetable_id')->constrained('timetables')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_events');
    }
};

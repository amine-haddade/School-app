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
    Schema::create('holiday_timetable', function (Blueprint $table) {
        $table->id();
        $table->foreignId('timetable_id')->constrained('timetables')->onDelete('cascade');
        $table->foreignId('holiday_id')->constrained('holidays')->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_timetable');
    }
};

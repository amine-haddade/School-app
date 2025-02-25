<?php

use App\Models\Classroom;
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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('classroom_name');
            $table->timestamps();
        });
        Schema::create('sessions_events', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->integer('start');
            $table->integer('length');
            $table->foreignIdFor(Classroom::class)->constrained();
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

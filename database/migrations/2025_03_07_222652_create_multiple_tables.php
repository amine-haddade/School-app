<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table Classrooms
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->string('type')->nullable();
            $table->timestamps();
        });

        

        // Table Trainers (linked to users)
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->string('specialty')->nullable();
            $table->integer('weekly_hours')->nullable();
            $table->timestamps();
        });

        // Table Fields
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Table Groups (linked to fields)
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->timestamps();
        });

        // Table Subjects (linked to fields)


        // pour les module je dois faire deux primary key name and field id
        // pour èviter   crèe une module dans la meme filière deux fois 
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade');
            $table->integer('in_person_hours');
            $table->integer('online_hours');
            $table->string('exam_type');
            $table->string('semester');
            $table->timestamps();
        });

        // Table Assignments (linked to Trainers, Subjects, Groups)

        // la mem chose pour assignment table les trois clone dois unique tous primary key
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->constrained('trainers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->timestamps();
        });

        // Table School Years
        // les deux collen start year et end year doi primary key
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->integer('start_year');
            $table->integer('end_year');
            $table->timestamps();
        });

        // Table Weeks (linked to School Years)
        Schema::create('weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('week_number');
            $table->foreignId('school_year_id')->constrained('school_years')->onDelete('cascade');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        // Table Sessions_event (linked to multiple tables)
        Schema::create('sessions_events', function (Blueprint $table) {
            $table->id();
            $table->date('session_date');
            $table->foreignId('week_id')->constrained('weeks')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('trainer_id')->constrained('trainers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
            $table->string('day');
            $table->integer('session_number');
            $table->integer('duration');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions_events');
        Schema::dropIfExists('weeks');
        Schema::dropIfExists('school_years');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('trainers');
        Schema::dropIfExists('classrooms');
    }
};

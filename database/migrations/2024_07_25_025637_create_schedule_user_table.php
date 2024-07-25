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
        Schema::create('schedule_user', function (Blueprint $table) {
            $table->id('id_schedule_user');
            $table->string('title');
            $table->string('description');
            $table->date('date_meeting');
            $table->string('type')->check('type in ("Online", "Offline")');
            $table->string('url');
            $table->timestamps();
            $table->foreignId('id_project')->constrained('project')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_user');
    }
};

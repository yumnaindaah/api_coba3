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
        Schema::create('meeting', function (Blueprint $table) {
            $table->bigIncrements('id_meeting');
            //$table->foreign('id_project')->references('id_project')->on('project');
            $table->string('title','100');
            $table->string('description');
            $table->date('date_meeting');
            //$table->foreign('id_user')->references('id_user')->on('users');
            $table->enum('type',['Online','Offline']);
            $table->string('url');
            $table->timestamps();

            $table->unsignedBigInteger('id_project');  // Add this if it's missing
            $table->unsignedBigInteger('id_user');  // partisipan

    // Define the foreign keys
            $table->foreign('id_project')->references('id')->on('project');
            $table->foreign('id_user')->references('id')->on('users'); // partisipan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting');
    }
};

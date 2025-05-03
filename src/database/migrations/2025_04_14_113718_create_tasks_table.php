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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id');
            $table->string('title');
            $table->enum('priority',array_column(\App\Domain\Enum\Priority::cases(),'value'));   // use enums as strings: high, medium, low
            $table->enum('status',array_column(\App\Domain\Enum\Status::cases(),'value'));     // use enums: todo, in-progress, completed
            $table->dateTime('due_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

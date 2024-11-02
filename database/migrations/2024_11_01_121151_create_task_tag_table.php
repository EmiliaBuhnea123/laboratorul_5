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
        Schema::create('task_tag', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('task_id'); 
            $table->unsignedBigInteger('tag_id'); 
            $table->timestamps(); 
    
            $table->foreign('task_id')->references('id')->on('task')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('tag_id')->references('id')->on('tag')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->unique(['task_id', 'tag_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_tag');
    }
};

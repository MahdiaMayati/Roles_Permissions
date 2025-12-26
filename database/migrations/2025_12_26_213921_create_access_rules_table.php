<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('access_rules', function (Blueprint $table) {
            $table->id();
            $table->string('entity');
            $table->string('action');
            $table->json('conditions');   
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_rules');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 30);
            $table->string('correo', 30)->unique();
            $table->string('passwordd', 20);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('clientes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('codigo_verificacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->integer('codigo');
            $table->dateTime('fecha_caducidad');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('codigo_verificacion');
    }
};

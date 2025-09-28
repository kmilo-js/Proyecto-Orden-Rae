<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('ID_VENTA'); // int(11) AUTO_INCREMENT
            $table->date('fecha');
            $table->decimal('total', 10, 2);

            // Relación con cliente
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')
                  ->references('ID_CLIENTE')->on('cliente')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('venta');
    }
};


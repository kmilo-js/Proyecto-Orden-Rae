<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('producto_has_venta', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('venta_id');
            $table->unsignedInteger('producto_id');

            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);

            $table->timestamps();

            $table->foreign('venta_id')
                  ->references('ID_VENTA')->on('venta')
                  ->onDelete('cascade');

            $table->foreign('producto_id')
                  ->references('ID_PRODUCTO')->on('producto')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('producto_has_venta');
    }
};
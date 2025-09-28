<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('ID_CLIENTE'); // int(11) AUTO_INCREMENT
            $table->string('nombre', 100);
            $table->string('email', 100)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cliente');
    }
};

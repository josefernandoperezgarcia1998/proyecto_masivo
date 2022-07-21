<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->nullable();
            $table->string('nombre');
            $table->string('correo');
            $table->string('telefono');
            $table->enum('licencia', ['Premium', 'Básica']);
            $table->string('cantidad');
            $table->string('subtotal');
            $table->string('iva');
            $table->string('total');
            $table->enum('estado', ['Pagado', 'No pagado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('Producto_Id');
            $table->string('Pro_Codigo',50)->nullable();
            $table->string('Pro_Nombre',100)->unique();
            $table->decimal('Pro_PrecioVenta',11,2);
            $table->integer('Pro_Stock');
            $table->boolean('Pro_Condicion')->default(1);
            $table->integer('IdCategoria')->unsigned();
            $table->timestamps();

            $table->foreign('IdCategoria')->references('IdCategoria')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

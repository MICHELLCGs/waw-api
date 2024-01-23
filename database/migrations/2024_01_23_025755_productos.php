<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('codigo_producto')->unique(); 
            $table->decimal('precio_unitario', 10, 2); 
            $table->unsignedBigInteger('categoria_id'); 
            $table->json('imagenes');
            $table->enum('estado_producto', ['activo', 'inactivo']);
            $table->timestamps();

            
            $table->foreign('categoria_id')->references('category_id')->on('categorias');
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
};

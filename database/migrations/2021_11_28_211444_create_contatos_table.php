<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 60)->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('cep', 8)->nullable();
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados');
            $table->string('cidade', 60)->nullable();
            $table->string('bairro', 40)->nullable();
            $table->string('endereco', 60)->nullable();
            $table->string('numero', 6)->nullable();
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
        Schema::dropIfExists('contatos');
    }
}

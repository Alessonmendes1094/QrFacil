<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('fantasia')->nullable()->change();
            $table->string('cnpj')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('telefone')->nullable()->change();
            $table->string('endereco')->nullable()->change();
            $table->string('cidade')->nullable()->change();
            $table->string('contato')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

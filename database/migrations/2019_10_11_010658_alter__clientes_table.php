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
            $table->dropColumn('fantasia');
            $table->dropColumn('cnpj');
            $table->dropColumn('email');
            $table->dropColumn('telefone');
            $table->dropColumn('endereco');
            $table->dropColumn('cidade');
            $table->dropColumn('contato');
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

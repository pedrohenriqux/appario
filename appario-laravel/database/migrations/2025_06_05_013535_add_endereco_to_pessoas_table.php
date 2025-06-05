<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        Schema::table('pessoas', function (Blueprint $table) {
            $table->string('endereco')->nullable()->after('tipo');
        });
    }

    public function down()
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->dropColumn('endereco');
        });
    }
};

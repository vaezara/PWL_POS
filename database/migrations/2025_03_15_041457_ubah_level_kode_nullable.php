<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('m_level', function (Blueprint $table) {
            $table->string('level_nama')->nullable(false)->default('')->change();
        });
    }

    public function down()
    {
        Schema::table('m_level', function (Blueprint $table) {
            $table->dropColumn('level_nama');
        });
    }
};
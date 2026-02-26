<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->string('identificacion')->unique()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('contactos', function (Blueprint $table) {
            $table->dropUnique(['identificacion']);
            $table->dropColumn('identificacion');
        });
    }
};

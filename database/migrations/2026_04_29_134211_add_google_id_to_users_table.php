<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Cek dulu biar gak error kalau kolomnya ternyata sudah ada
        if (!Schema::hasColumn('users', 'google_id')) {
            $table->string('google_id')->nullable()->after('id');
        }
        if (!Schema::hasColumn('users', 'role')) {
            $table->string('role')->default('member')->after('password');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

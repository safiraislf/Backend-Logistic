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
        Schema::table('data', function (Blueprint $table) {
            $table->string('name')->nullable;
            $table->string('unit')->nullable;
            $table->string('event')->nullable;
            $table->string('item')->nullable;
            $table->string('pinjam')->nullable;
            $table->string('kembali')->nullable;
            $table->string('status')->nullable;
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'unit',
                'event',
                'item',
                'pinjam',
                'kembali',
                'status',
            ]);
        });
    }
};

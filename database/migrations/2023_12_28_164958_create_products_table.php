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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->decimal('harga', 8, 2);
            $table->enum('status', ['active', 'inactive']);
            $table->string('image_url');
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('stok')->default(0);
            $table->string('produsen')->nullable();
            $table->string('kategori')->nullable();
            $table->string('komposisi')->nullable();
            $table->string('kemasan')->nullable();
            $table->string('lokasi_penyimpanan')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Tambahkan baris ini untuk soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

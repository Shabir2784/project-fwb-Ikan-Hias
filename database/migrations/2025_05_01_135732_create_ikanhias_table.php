<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // diperbaiki
            $table->string('password');
            $table->string('telepon')->nullable();
            $table->enum('role', ['admin', 'penjual', 'pembeli'])->default('pembeli'); // enum langsung
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('koleksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->foreignId('pengguna_id')->constrained('penggunas')->onDelete('cascade');
            $table->foreignId('koleksi_id')->nullable()->constrained('koleksis')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('penggunas')->onDelete('cascade');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });

        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade');
            $table->decimal('jumlah', 10, 2);
            $table->string('metode');
            $table->enum('status', ['belum dibayar', 'sudah dibayar'])->default('belum dibayar');
            $table->timestamps();
        });

        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanans')->onDelete('cascade');
            $table->string('nama_penerima');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->string('kurir');
            $table->string('no_resi')->nullable();
            $table->enum('status', ['belum dikirim', 'dikirim', 'diterima'])->default('belum dikirim');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengirimans');
        Schema::dropIfExists('pembayarans');
        Schema::dropIfExists('detail_pesanans');
        Schema::dropIfExists('pesanans');
        Schema::dropIfExists('produks');
        Schema::dropIfExists('koleksis');
        Schema::dropIfExists('penggunas');
    }
};

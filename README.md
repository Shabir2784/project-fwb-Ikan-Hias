# Toko Online Ikan Hias

**Nama:** Shabir  
**NIM:** D0223306  
**Mata Kuliah:** Framework Web Based  
**Tahun:** 2025  

---

## 🎯 Role dan Fitur

### 1. Role: Admin  
_Fokus: Mengelola sistem dan pengguna_

| Fitur                        | Deskripsi                                               |
|-----------------------------|----------------------------------------------------------|
| Mengelola data pengguna     | CRUD data pengguna                                       |
| Role dan Hak Akses          | Membuat, mengedit, menghapus role dan mengatur akses    |
| Produk & Koleksi            | Kelola semua produk dan kategori                        |
| Pesanan & Pembayaran        | Lihat semua pesanan & status                            |
| Laporan                     | Laporan transaksi (opsional)                            |
| Akses                       | Akses penuh ke semua fitur                              |

---

### 2. Role: Seller (Penjual)  
_Fokus: Mengelola produk dan pesanan_

| Fitur                         | Deskripsi                                          |
|------------------------------|-----------------------------------------------------|
| Kelola Produk                | CRUD produk milik sendiri                          |
| Koleksi Produk               | Kelompokkan produk ke koleksi                     |
| Pesanan Masuk                | Lihat pesanan produk sendiri                      |
| Update Pengiriman            | Tandai sebagai dikirim                            |
| Lihat Pembayaran             | Untuk pesanan produk miliknya                     |
| Batas Akses                  | Tidak bisa kelola user atau role                  |

---

### 3. Role: Customer (Pembeli)  
_Fokus: Belanja dan riwayat pesanan_

| Fitur                        | Deskripsi                                        |
|-----------------------------|---------------------------------------------------|
| Lihat Produk                | Jelajahi daftar produk                            |
| Checkout                    | Lakukan pemesanan                                 |
| Riwayat Pesanan             | Lihat semua pesanan pribadi                       |
| Pembayaran                  | Lakukan pembayaran                                |
| Status Pengiriman           | Lacak pesanan yang dikirim                        |
| Batas Akses                 | Tidak bisa menambah produk atau kelola sistem    |

---

## 🗂 Struktur Tabel Database

### Tabel: roles
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | bigint | Auto increment, primary key |
| name | string | admin/seller/customer |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diubah |

### Tabel: penggunas
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | bigint | Auto increment, primary key |
| nama | string | Nama pengguna |
| email | string | Harus unik |
| email_terverifikasi | timestamp | Boleh kosong |
| password | string | Password terenkripsi |
| telepon | string | Boleh kosong |
| role_id | foreignId | Relasi ke roles.id |
| remember_token | string | Token untuk remember me |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diubah |

### Tabel: produks
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| id | bigint | Auto increment |
| nama | string | Nama produk |
| deskripsi | text | Boleh kosong |
| harga | decimal(10,2) | Harga produk |
| stok | integer | Jumlah stok |
| gambar | string | Path gambar |
| pengguna_id | foreignId | Relasi ke penggunas.id |
| koleksi_id | foreignId | Boleh null, ke koleksis.id |
| created_at | timestamp | Waktu dibuat |
| updated_at | timestamp | Waktu diubah |
| deleted_at | timestamp | Soft delete |

_(Lanjutkan untuk tabel lainnya bila perlu)_

---

## 🔗 Jenis Relasi Antar Tabel

| Relasi Tabel | Jenis Relasi | Keterangan |
|--------------|--------------|------------|
| roles → penggunas | One to Many | Satu role dimiliki banyak pengguna |
| penggunas → produks | One to Many | Seller bisa punya banyak produk |
| penggunas → pesanans | One to Many | Customer bisa punya banyak pesanan |
| koleksis → produks | One to Many | Satu koleksi bisa berisi banyak produk |
| produks → detail_pesanans | One to Many | Satu produk bisa muncul di banyak item pesanan |
| pesanans → detail_pesanans | One to Many | Satu pesanan memiliki banyak item |
| pesanans → pembayarans | One to One | Satu pesanan hanya punya satu pembayaran |
| pesanans → pengirimans | One to One | Satu pesanan hanya punya satu pengiriman |

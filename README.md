<h3 align="center">Toko Online Ikan Hias</h3>
<br><br><br>

<p align="center">
  <img src="logo.png" width="250px" />
</p>

<br><br><br>

<p align="center"><strong>Shabir</strong><br/>
D0223306<br/><br/>
Framework Web Based<br/>2025</p>

---

<h2>Role dan Fitur</h2>

<h3>1. Admin</h3>
<ul>
  <li><strong>Fokus:</strong> Mengelola sistem dan pengguna</li>
  <li><strong>Fitur:</strong>
    <ul>
      <li>Mengelola data pengguna (CRUD user)</li>
      <li>Mengelola role dan hak akses</li>
      <li>Mengelola semua produk dan koleksi</li>
      <li>Melihat semua pesanan dan status</li>
      <li>Melihat laporan transaksi</li>
    </ul>
  </li>
</ul>

<h3>2. Seller (Penjual)</h3>
<ul>
  <li><strong>Fokus:</strong> Mengelola produk & pesanan sendiri</li>
  <li><strong>Fitur:</strong>
    <ul>
      <li>CRUD produk milik sendiri</li>
      <li>Mengelola koleksi produk</li>
      <li>Melihat pesanan masuk terkait produknya</li>
      <li>Update status pengiriman</li>
      <li>Melihat pembayaran pesanan miliknya</li>
    </ul>
  </li>
</ul>

<h3>3. Customer (Pembeli)</h3>
<ul>
  <li><strong>Fokus:</strong> Belanja dan melacak pesanan</li>
  <li><strong>Fitur:</strong>
    <ul>
      <li>Melihat daftar produk</li>
      <li>Checkout dan pembayaran</li>
      <li>Melihat riwayat pesanan</li>
      <li>Melacak status pengiriman</li>
    </ul>
  </li>
</ul>

---

<h2>🗂 Struktur Tabel Database</h2>

<h3>Tabel: roles</h3>
<table>
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigint</td><td>Auto increment, primary key</td></tr>
<tr><td>name</td><td>string</td><td>admin/seller/customer</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Waktu dibuat</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Waktu diubah</td></tr>
</tbody>
</table>

<h3>Tabel: penggunas</h3>
<table>
<thead>
<tr><th>Nama Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>id</td><td>bigint</td><td>Auto increment</td></tr>
<tr><td>nama</td><td>string</td><td>Nama pengguna</td></tr>
<tr><td>email</td><td>string</td><td>Harus unik</td></tr>
<tr><td>email_terverifikasi</td><td>timestamp</td><td>Boleh kosong</td></tr>
<tr><td>password</td><td>string</td><td>Terenkripsi</td></tr>
<tr><td>telepon</td><td>string</td><td>Boleh kosong</td></tr>
<tr><td>role_id</td><td>foreignId</td><td>Relasi ke roles.id</td></tr>
<tr><td>remember_token</td><td>string</td><td>Untuk fitur remember me</td></tr>
<tr><td>created_at</td><td>timestamp</td><td>Waktu dibuat</td></tr>
<tr><td>updated_at</td><td>timestamp</td><td>Waktu diubah</td></tr>
</tbody>
</table>

_(Tambahkan tabel lainnya seperti produks, pesanans, dll jika perlu)_

---

<h2>🔗 Jenis Relasi Antar Tabel</h2>

<table>
<thead>
<tr><th>Relasi Tabel</th><th>Jenis Relasi</th><th>Keterangan</th></tr>
</thead>
<tbody>
<tr><td>roles → penggunas</td><td>One to Many</td><td>Satu role dimiliki banyak user</td></tr>
<tr><td>penggunas → produks</td><td>One to Many</td><td>Seller bisa punya banyak produk</td></tr>
<tr><td>penggunas → pesanans</td><td>One to Many</td><td>Customer bisa punya banyak pesanan</td></tr>
<tr><td>koleksis → produks</td><td>One to Many</td><td>Koleksi berisi banyak produk</td></tr>
<tr><td>produks → detail_pesanans</td><td>One to Many</td><td>Produk muncul di banyak item pesanan</td></tr>
<tr><td>pesanans → detail_pesanans</td><td>One to Many</td><td>Pesanan memiliki banyak item</td></tr>
<tr><td>pesanans → pembayarans</td><td>One to One</td><td>Satu pembayaran per pesanan</td></tr>
<tr><td>pesanans → pengirimans</td><td>One to One</td><td>Satu pengiriman per pesanan</td></tr>
</tbody>
</table>

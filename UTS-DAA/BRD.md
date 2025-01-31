# Dokumen Kebutuhan Bisnis (Business Requirements Document - BRD)

## 1. Ikhtisar Proyek
Sistem Manajemen Beasiswa (SMS) adalah platform berbasis web yang dirancang untuk mengelola dan mempermudah proses pengajuan beasiswa, unggah dokumen, verifikasi, seleksi, dan pengumuman. Sistem ini melayani tiga jenis pengguna utama: Admin, Mahasiswa, dan Kaprodi (Kepala Program Studi). Setiap peran memiliki izin dan tanggung jawab spesifik untuk memastikan alur kerja yang lancar.

## 2. Tujuan
- Mengotomatiskan dan mengelola proses pengajuan beasiswa.
- Menyediakan metode yang aman dan andal bagi mahasiswa untuk mengajukan beasiswa, mengunggah dokumen yang diperlukan, dan melacak status aplikasi.
- Memungkinkan admin untuk mengelola data beasiswa, memverifikasi dokumen, dan membuat pengumuman.
- Memungkinkan Kaprodi untuk memvalidasi dan menyetujui aplikasi.

## 3. Ruang Lingkup
Sistem ini mencakup:

- **Manajemen Beasiswa**: Pembuatan dan pengelolaan data beasiswa termasuk nama, jenis, persyaratan, dan periode.
- **Manajemen Aplikasi**: Mahasiswa dapat mengajukan beasiswa dan mengunggah dokumen yang diperlukan.
- **Verifikasi dan Persetujuan**: Admin memverifikasi dokumen, dan Kaprodi memvalidasi aplikasi.
- **Pengumuman**: Publikasi pengumuman terkait beasiswa.
- **Proses Seleksi**: Memproses dan memilih penerima beasiswa berdasarkan kriteria yang telah ditetapkan.

## 4. Peran Pengguna dan Izin

### Admin
- Mengelola dan memverifikasi dokumen beasiswa.
- Mengelola data beasiswa.
- Mempublikasikan pengumuman.
- Melihat status aplikasi.

### Mahasiswa
- Mengajukan beasiswa.
- Mengunggah dokumen yang diperlukan.
- Melihat pengumuman.
- Mengecek status aplikasi.

### Kaprodi (Kepala Program Studi)
- Memvalidasi aplikasi.
- Berpartisipasi dalam seleksi penerima.
- Melihat distribusi beasiswa.

## 5. Kebutuhan Fungsional

### 5.1 Manajemen Beasiswa
- **Pembuatan dan Pengelolaan Beasiswa**: Admin dapat membuat beasiswa dengan mengisi informasi seperti nama, jenis, persyaratan, periode, dan status (aktif/nonaktif).
- **Manajemen Kuota**: Menentukan jumlah penerima untuk setiap beasiswa.
- **Manajemen Periode**: Menentukan tanggal mulai dan berakhirnya aplikasi beasiswa.

### 5.2 Proses Aplikasi
- **Sistem Login**: Semua pengguna harus login untuk mengakses fungsionalitas masing-masing.
- **Pengajuan Beasiswa**:
  - Mahasiswa dapat melihat beasiswa yang tersedia.
  - Mahasiswa dapat mengajukan aplikasi dengan mengisi formulir aplikasi, yang mencakup informasi pribadi dan akademik.
- **Unggah Dokumen**: Mahasiswa mengunggah dokumen (misalnya, KTP, transkrip nilai) yang diperlukan untuk aplikasi.

### 5.3 Verifikasi Dokumen
- **Verifikasi oleh Admin**: Admin memverifikasi dokumen yang diunggah dan memberikan status (valid, invalid, atau pending).
- **Unggah Ulang Dokumen**: Jika dokumen dinyatakan tidak valid, mahasiswa diberi notifikasi untuk mengunggah ulang dokumen yang benar.

### 5.4 Validasi Aplikasi
- **Validasi oleh Kaprodi**: Kaprodi meninjau aplikasi yang telah lulus tahap verifikasi dokumen dan menyetujui atau menolak aplikasi berdasarkan kriteria yang ditentukan.

### 5.5 Proses Seleksi
- **Seleksi dan Persetujuan**: Sistem memproses aplikasi untuk memilih penerima berdasarkan kriteria yang telah ditentukan.
- **Pembaharuan Status**: Sistem memperbarui status aplikasi menjadi diterima atau ditolak dan memberikan notifikasi kepada mahasiswa.

### 5.6 Pengumuman
- **Membuat dan Mempublikasikan Pengumuman**: Admin dapat membuat pengumuman terkait beasiswa, seperti batas waktu, hasil seleksi, dan panduan.
- **Melihat Pengumuman**: Mahasiswa dapat melihat pengumuman yang dipublikasikan oleh Admin.

## 6. Analisis Model Data

### Entitas dan Atribut
1. **Mahasiswa**
   - Atribut: `nim`, `nama`, `prodi`, `no_telp`, `email`, `angkatan`, `semester`, `ipk`, `alamat`

2. **Beasiswa**
   - Atribut: `id_beasiswa`, `kuota`, `tanggal_mulai`, `tanggal_selesai`, `syarat`, `nama_beasiswa`, `jenis_beasiswa`, `periode`, `status`

3. **Pendaftaran**
   - Atribut: `id_pendaftaran`, `id_beasiswa`, `tanggal_daftar`, `penghasilan_ortu`, `semester_saat_daftar`, `ipk_saat_daftar`, `nim`, `status_verifikasi`, `status_seleksi`

4. **Berkas**
   - Atribut: `id_berkas`, `id_pendaftaran`, `tanggal_upload`, `jenis_berkas`, `nama_file`, `status_verifikasi`, `keterangan`

5. **Pengumuman**
   - Atribut: `id_pengumuman`, `id_beasiswa`, `isi`, `judul`, `tanggal_post`, `status`

6. **PenerimaBeasiswa**
   - Atribut: `id_penerima`, `id_pendaftaran`, `tanggal_terima`, `nominal_diterima`, `periode_penerimaan`, `status_pencairan`

### Relasi
- **Mahasiswa - Pendaftaran**: Seorang Mahasiswa dapat memiliki beberapa Pendaftaran (aplikasi).
- **Beasiswa - Pendaftaran**: Satu Beasiswa dapat memiliki beberapa Pendaftaran.
- **Pendaftaran - Berkas**: Satu Pendaftaran dapat memiliki beberapa Berkas (dokumen).
- **Beasiswa - Pengumuman**: Satu Beasiswa dapat memiliki beberapa Pengumuman.
- **Pendaftaran - PenerimaBeasiswa**: Satu Pendaftaran dapat terkait dengan PenerimaBeasiswa jika diterima.

## 7. Kebutuhan Non-Fungsional
- **Keamanan**: Sistem harus memastikan bahwa hanya pengguna yang terautentikasi dan terotorisasi yang dapat mengakses fungsionalitas sesuai perannya.
- **Keandalan**: Sistem harus dapat melacak aplikasi dengan akurat dan menjaga integritas data beasiswa.
- **Kemudahan Penggunaan**: Antarmuka harus ramah pengguna dan mudah diakses oleh pengguna dengan pengetahuan komputer dasar.
- **Performa**: Sistem harus bekerja optimal dan dapat menangani pengguna bersamaan tanpa lambat.
- **Cadangan dan Pemulihan Data**: Sistem harus memiliki cadangan data reguler untuk mencegah kehilangan data.

## 8. Analisis Use Case

Berdasarkan diagram use case, berikut adalah use case utama:

### Admin
- Login
- Mengelola Beasiswa
- Verifikasi Dokumen
- Mempublikasikan Pengumuman
- Melihat Status Aplikasi

### Mahasiswa
- Login
- Mendaftar Beasiswa
- Mengunggah Dokumen
- Melihat Pengumuman
- Mengecek Status Aplikasi

### Kaprodi
- Login
- Memvalidasi Aplikasi
- Menyeleksi Penerima
- Melihat distribusi beasiswa

## 9. User Stories

1. **Sebagai mahasiswa**, saya ingin mendaftar beasiswa dan mengunggah dokumen yang diperlukan, sehingga saya bisa dipertimbangkan untuk bantuan finansial.
2. **Sebagai admin**, saya ingin memverifikasi dokumen yang diunggah, sehingga saya bisa memastikan pelamar memenuhi persyaratan.
3. **Sebagai Kaprodi**, saya ingin memvalidasi aplikasi dan menyeleksi penerima, sehingga saya bisa menyetujui mahasiswa yang memenuhi syarat untuk beasiswa.
4. **Sebagai admin**, saya ingin mempublikasikan pengumuman terkait beasiswa, sehingga mahasiswa mendapatkan informasi penting.
5. **Sebagai Kaprodi**, saya ingin melihat distribusi beasiswa, sehingga saya dapat melakukan analisis dan audit seleksi.

## 10. Kriteria Penerimaan

1. **Pengajuan Aplikasi**: Mahasiswa harus dapat mengajukan aplikasi dengan informasi dan dokumen yang lengkap.
2. **Verifikasi Dokumen**: Admin harus dapat memverifikasi dokumen dan memberi status valid atau invalid.
3. **Validasi Aplikasi**: Kaprodi harus dapat memvalidasi dan menyetujui atau menolak aplikasi.
4. **Notifikasi Seleksi**: Mahasiswa harus diberi notifikasi tentang hasil aplikasi.
5. **Pembuatan Distribusi Beasiswa**: Kaprodi dan Admin harus dapat membuat dan melihat distribusi beasiswa.

## 11. Asumsi dan Batasan

### Asumsi:
- Semua pengguna memiliki akses ke koneksi internet yang stabil.
- Pengguna familiar dengan operasi komputer dasar.
- Sistem akan menggunakan data mahasiswa dan beasiswa yang sudah ada.

### Batasan:
- Sistem harus mematuhi undang-undang perlindungan data untuk menjaga privasi data mahasiswa.
- Waktu pengembangan yang terbatas dapat memengaruhi jumlah fitur yang diimplementasikan.

## 12. Risiko

- **Kehilangan Data**: Risiko kehilangan data saat migrasi atau pembaruan.
- **Pelanggaran Keamanan**: Akses tidak sah ke data beasiswa yang sensitif.
- **Waktu Henti Sistem**: Potensi waktu henti selama periode puncak penggunaan karena beban tinggi.
# Aplikasi Klasifikasi Jenis Sampah

## Pendahuluan

### Latar Belakang
Sampah merupakan salah satu permasalahan lingkungan yang terus meningkat seiring bertambahnya jumlah penduduk dan pola konsumsi masyarakat. Sampah yang tidak dikelola dengan baik dapat menimbulkan pencemaran, gangguan kesehatan, dan memperburuk kondisi ekosistem. Salah satu cara untuk mengatasi masalah ini adalah dengan klasifikasi dan pemilahan sampah sebelum dibuang.

Namun, masih banyak masyarakat yang belum memahami cara memilah sampah dengan benar, sehingga banyak sampah yang seharusnya bisa didaur ulang justru bercampur dengan sampah lain dan berakhir di tempat pembuangan akhir (TPA). Oleh karena itu, dibutuhkan solusi berbasis teknologi untuk memberikan edukasi dan sistem pencatatan yang memudahkan masyarakat dalam memilah sampah.

### Tujuan Pengembangan Aplikasi
Aplikasi Klasifikasi Jenis Sampah dikembangkan dengan tujuan utama:
- Membantu masyarakat memilah sampah berdasarkan jenisnya dengan mudah dan akurat.
- Menyediakan informasi edukatif tentang klasifikasi sampah dan cara pengelolaannya.
- Mencatat dan memonitor riwayat pemilahan sampah, sehingga pengguna dapat melihat kontribusi mereka terhadap lingkungan.
- Meningkatkan kebiasaan memilah sampah sejak dini dengan sistem yang interaktif dan terstruktur.

## Analisis Dasar

### Pengertian
Klasifikasi sampah adalah proses mengelompokkan sampah berdasarkan karakteristik dan cara pengelolaannya. Sampah dapat dibagi ke dalam beberapa kategori:
- **Organik**: Sisa makanan, daun, kertas (mudah terurai dan dapat dikomposkan).
- **Anorganik**: Plastik, kaca, logam (tidak mudah terurai, tetapi dapat didaur ulang).
- **B3 (Bahan Berbahaya dan Beracun)**: Baterai, limbah elektronik, obat-obatan (memerlukan penanganan khusus).

Aplikasi ini mendukung pemilahan sampah berbasis digital, memudahkan pengguna untuk mengelola sampah dengan kategori yang benar.

### Hubungan Tema dengan Aplikasi
Aplikasi ini bertujuan untuk memberikan solusi berbasis teknologi yang mendukung masyarakat dalam memilah sampah secara mandiri, tanpa memerlukan peran institusi atau pemerintahan. Sistem ini dirancang agar mudah digunakan oleh individu, komunitas, dan organisasi lingkungan yang ingin mengurangi dampak sampah terhadap ekosistem.

### Masalah yang Ingin Dipecahkan
- Kurangnya edukasi mengenai klasifikasi sampah, sehingga masyarakat sering membuang sampah tanpa memilahnya terlebih dahulu.
- Tidak adanya sistem pencatatan kontribusi pengguna, membuat pemilahan sampah sulit untuk dimonitor.
- Minimnya akses informasi yang terstruktur, sehingga masyarakat kesulitan mengetahui cara memilah sampah dengan benar.
- Sampah yang tercampur menyulitkan proses daur ulang, mengakibatkan banyak material yang dapat dimanfaatkan kembali justru terbuang sia-sia.

## Analisis 5W+1H

| Pertanyaan  | Jawaban |
|-------------|---------|
| **What (Apa)?** | Aplikasi berbasis Laravel Filament yang membantu masyarakat melaporkan, mencari informasi, memilah, dan mencatat riwayat pemilahan sampah. |
| **Why (Mengapa)?** | Untuk meningkatkan kesadaran masyarakat dan membantu mereka memilah sampah dengan benar, sehingga mengurangi dampak negatif terhadap lingkungan. |
| **Who (Siapa)?** | - **Super Admin**: Mengelola kategori sampah, laporan, dan data pengguna. <br> - **User (Masyarakat)**: Melaporkan sampah, mencari informasi, dan mencatat riwayat pemilahan. |
| **When (Kapan)?** | - Saat pengguna ingin melaporkan sampah yang ditemukan. <br> - Saat pengguna ingin memilah sampah yang mereka hasilkan. |
| **Where (Di mana)?** | Dapat digunakan di rumah, tempat kerja, sekolah, komunitas, dan tempat umum untuk membantu masyarakat memilah sampah secara lebih sistematis. |
| **How (Bagaimana)?** | 1. User login ke aplikasi. <br> 2. User melaporkan sampah dengan mengunggah foto dan deskripsi. <br> 3. User mencari informasi tentang klasifikasi sampah. <br> 4. User memilah sampah dan mencatat riwayat pemilahan. <br> 5. Super Admin mengelola sistem untuk memastikan data tetap valid. |

## Analisis Teknis

### Struktur Database

| Tabel               | Fungsi                                   |
|---------------------|------------------------------------------|
| **users**           | Menyimpan data pengguna.                 |
| **kategori_sampah** | Menyimpan kategori sampah.               |
| **sampah**          | Menyimpan daftar sampah berdasarkan kategori. |
| **laporan_sampah**  | Menyimpan laporan sampah dari user.      |
| **riwayat_pemilahan** | Menyimpan riwayat pemilahan sampah oleh user. |

**Relasi antar tabel:**
- **users (1:M) laporan_sampah** → Satu user dapat membuat banyak laporan.
- **users (1:M) riwayat_pemilahan** → Satu user dapat mencatat banyak riwayat pemilahan.
- **kategori_sampah (1:M) sampah** → Satu kategori dapat memiliki banyak jenis sampah.

### Use Case (Hak Akses & Fungsionalitas)

| Aktor         | Hak Akses                                                                 |
|---------------|---------------------------------------------------------------------------|
| **Super Admin** | CRUD kategori sampah, CRUD sampah, mengelola laporan, mengelola user     |
| **User**        | Membaca kategori sampah, melaporkan sampah, mencatat riwayat pemilahan   |
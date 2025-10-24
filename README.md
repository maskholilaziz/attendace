# Pengelolaan Payroll & Finance

Ini adalah modul inti yang menangani semua aspek kompensasi finansial karyawan. Dari sisi pengembangan, modul ini membutuhkan akurasi dan keamanan yang sangat tinggi karena berurusan langsung dengan data keuangan yang sensitif.

## Payroll THR Calculation (Kalkulasi Gaji & THR)

**Keterangan:**  
Fitur ini secara otomatis menghitung Tunjangan Hari Raya (THR) untuk setiap karyawan sesuai dengan regulasi pemerintah (misalnya, berdasarkan masa kerja). Sistem harus bisa dikonfigurasi untuk mengikuti perubahan aturan dari waktu ke waktu.

## Tax & BPJS Calculation (Kalkulasi Pajak & BPJS)

**Keterangan:**  
Modul ini bertugas menghitung potongan pajak penghasilan (PPh 21) dan iuran BPJS (Kesehatan dan Ketenagakerjaan) secara otomatis. Perhitungannya kompleks dan harus selalu up-to-date dengan peraturan pajak dan BPJS terbaru.

## Payroll Disbursement (Distribusi Gaji)

**Keterangan:**  
Fitur ini menyederhanakan proses transfer gaji. HR hanya perlu melakukan satu kali transfer ke virtual account yang telah ditentukan, dan sistem akan secara otomatis mendistribusikan gaji ke rekening masing-masing karyawan. Ini mengurangi pekerjaan manual dan risiko kesalahan transfer.

## Weekly Payroll (Penggajian Mingguan)

**Keterangan:**  
Memberikan fleksibilitas bagi perusahaan untuk menjalankan siklus penggajian mingguan, selain bulanan. Ini sangat berguna untuk industri yang mempekerjakan pekerja harian atau mingguan.

## Loan Administration (Administrasi Pinjaman)

**Keterangan:**  
Mengelola siklus pinjaman karyawan, mulai dari pengajuan, persetujuan, pencairan dana, hingga pemotongan cicilan secara otomatis dari gaji bulanan.

## Mekari Expense Management (Manajemen Pengeluaran)

**Keterangan:**  
Ini kemungkinan adalah fitur integrasi. Sistem HRIS terhubung dengan platform manajemen pengeluaran untuk mengelola proses reimbursement. Karyawan bisa mengajukan klaim biaya (misalnya, biaya perjalanan dinas), dan setelah disetujui, pembayarannya bisa langsung diproses bersamaan dengan payroll.

---

# Time Management

Modul ini fokus pada pengelolaan waktu kerja, kehadiran, dan cuti karyawan. Tujuannya adalah untuk memastikan pencatatan waktu yang akurat untuk kebutuhan penggajian dan analisis produktivitas.

## Overtime Administration (Administrasi Lembur)

**Keterangan:**  
Mengelola seluruh proses lembur, mulai dari pengajuan oleh karyawan, persetujuan oleh manajer, hingga kalkulasi otomatis upah lembur yang akan dimasukkan ke dalam komponen gaji.

## Time Off Administration (Administrasi Cuti)

**Keterangan:**  
Mengelola semua jenis cuti (tahunan, sakit, melahirkan, dll.). Sistem melacak kuota cuti setiap karyawan, memproses pengajuan dan persetujuan secara digital, dan mengurangi saldo cuti secara otomatis.

## Multiple Shift (Jadwal Kerja Fleksibel)

**Keterangan:**  
Memungkinkan HR untuk membuat dan menetapkan berbagai pola jadwal kerja (shift pagi, malam, long shift, jadwal berputar) untuk tim atau individu yang berbeda.

## Block Leave (Cuti Blok)

**Keterangan:**  
Fitur untuk menerapkan kebijakan di mana karyawan diwajibkan mengambil cuti dalam jumlah hari tertentu secara berurutan. Sistem dapat membantu memantau dan memberlakukan aturan ini.

## Hourly Leave (Izin Per Jam)

**Keterangan:**  
Memfasilitasi karyawan untuk mengajukan izin tidak masuk kerja hanya untuk beberapa jam (misalnya, untuk urusan pribadi atau ke dokter) tanpa harus mengambil cuti satu hari penuh.

## Live Attendance (Absensi Real-time)

**Keterangan:**  
Karyawan dapat melakukan absensi (clock-in/clock-out) melalui portal web atau perangkat khusus di kantor, dan datanya akan tercatat secara real-time di sistem.

## Mobile Attendance (Absensi via Ponsel)

**Keterangan:**  
Memungkinkan karyawan untuk melakukan absensi dari mana saja melalui aplikasi di ponsel mereka. Fitur ini biasanya dilengkapi dengan teknologi GPS geotagging untuk memverifikasi lokasi absensi.

## Talenta On Call

**Keterangan:**  
Fitur untuk mencatat status "On Call" atau siaga bagi karyawan yang harus siap bekerja di luar jam kerja normal. Sistem dapat digunakan untuk melacak jam siaga ini dan menghitung kompensasi tambahan jika ada.

## AI Liveness (Verifikasi Kehadiran dengan AI)

**Keterangan:**  
Saat melakukan absensi via ponsel, sistem menggunakan AI untuk melakukan verifikasi "kehidupan". Karyawan mungkin diminta untuk berkedip atau menggerakkan kepala untuk memastikan bahwa yang melakukan absensi adalah orang asli dan bukan foto, sehingga mencegah kecurangan (titip absen).

## Talenta Portal

**Keterangan:**  
Ini adalah dashboard atau halaman utama bagi karyawan dan manajer untuk mengakses semua fitur yang relevan dengan mereka, seperti melihat slip gaji, mengajukan cuti, atau melihat data tim.

---

# Company & Employee Management

Ini adalah fondasi dari HRIS, berfungsi sebagai pusat data untuk semua informasi terkait perusahaan dan karyawan.

## Employee Database (Database Karyawan)

**Keterangan:**  
Sistem terpusat untuk menyimpan dan mengelola semua data karyawan, mulai dari informasi pribadi, data kontak, dokumen (KTP, kontrak kerja), riwayat pekerjaan, hingga informasi keluarga.

## Multi-level Approval (Persetujuan Bertingkat)

**Keterangan:**  
Memungkinkan pembuatan alur kerja persetujuan yang kompleks. Contoh: pengajuan cuti harus disetujui oleh atasan langsung, lalu manajer departemen, sebelum akhirnya ke HR. Alur ini bisa disesuaikan untuk setiap jenis pengajuan.

## Activity Tracking (Pelacakan Aktivitas)

**Keterangan:**  
Mencatat semua aktivitas dan perubahan data penting yang terjadi di dalam sistem (misalnya, siapa yang mengubah data gaji karyawan dan kapan). Ini penting untuk audit dan keamanan.

## Multi Branch (Manajemen Multi-Cabang)

**Keterangan:**  
Memfasilitasi pengelolaan karyawan yang tersebar di berbagai lokasi atau kantor cabang. Kebijakan, jadwal libur, dan pelaporan dapat dibedakan untuk setiap cabang.

## Organization Chart (Struktur Organisasi)

**Keterangan:**  
Secara otomatis menghasilkan diagram visual yang menunjukkan struktur hierarki perusahaan, termasuk hubungan antara atasan dan bawahan.

## Custom Fields (Kolom Data Kustom)

**Keterangan:**  
Memberikan keleluasaan bagi HR untuk menambahkan kolom data baru pada profil karyawan sesuai kebutuhan unik perusahaan (misalnya, ukuran seragam, nomor loker, dll.).

## Flexible Access Role (Peran Akses Fleksibel)

**Keterangan:**  
Menyediakan peran pengguna yang sudah ditentukan sebelumnya (misal: Karyawan, Manajer, Admin HR) dengan hak akses yang berbeda-beda untuk memastikan setiap orang hanya bisa melihat dan mengubah data yang relevan.

## Custom Roles (Peran Kustom)

**Keterangan:**  
Tingkat lanjut dari Flexible Access Role, di mana admin dapat membuat peran baru dari awal dan menentukan hak aksesnya secara spesifik untuk setiap fitur atau data.

## Strategic Business Unit (SBU)

**Keterangan:**  
Memungkinkan perusahaan untuk mengelompokkan karyawan, departemen, atau cabang ke dalam unit bisnis yang berbeda. Ini berguna untuk pelaporan dan analisis keuangan yang terpisah per unit bisnis.

## Talenta Form

**Keterangan:**  
Alat untuk membuat formulir digital kustom yang dapat digunakan untuk berbagai keperluan HR, seperti survei kepuasan karyawan, formulir permintaan aset, atau checklist penilaian kinerja.

## Manpower Planning (Perencanaan Tenaga Kerja)

**Keterangan:**  
Alat bantu untuk merencanakan kebutuhan sumber daya manusia di masa depan. HR dapat membuat budgeting jumlah karyawan dan posisi yang dibutuhkan berdasarkan target pertumbuhan perusahaan.

## Recruitment (Perekrutan)

**Keterangan:**  
Modul ini berfungsi sebagai Applicant Tracking System (ATS) sederhana untuk mengelola proses rekrutmen, mulai dari publikasi lowongan, pelacakan lamaran, penjadwalan wawancara, hingga proses penawaran kerja.

## Employee Onboarding (Penerimaan Karyawan Baru)

**Keterangan:**  
Mengotomatiskan dan menstandarisasi proses penerimaan karyawan baru. Sistem menyediakan checklist tugas yang harus diselesaikan (misalnya, penandatanganan kontrak, persiapan perangkat kerja, jadwal orientasi) untuk memastikan tidak ada yang terlewat.

## Employee Offboarding (Pemberhentian Karyawan)

**Keterangan:**  
Mengelola proses ketika seorang karyawan berhenti bekerja. Sistem menyediakan checklist untuk memastikan semua prosedur (seperti wawancara keluar, pengembalian aset, perhitungan pesangon) dijalankan dengan benar.

---

# Employee Experience & Benefits Management

Fitur-fitur ini bertujuan untuk meningkatkan kepuasan dan keterlibatan karyawan dengan memberikan kemudahan akses dan manfaat tambahan.

## Employee Self Service (ESS)

**Keterangan:**  
Memberdayakan karyawan untuk mengakses dan mengelola data HR mereka sendiri, seperti melihat slip gaji, memperbarui data pribadi, atau mengajukan cuti, tanpa perlu melalui departemen HR.

## Early Wage Access (Akses Gaji Lebih Awal)

**Keterangan:**  
Sebuah fasilitas di mana karyawan dapat menarik sebagian dari gaji yang sudah mereka peroleh sebelum tanggal gajian resmi. Ini dapat membantu karyawan dalam situasi darurat keuangan.

## Mekari Flex

**Keterangan:**  
Sebuah program tunjangan fleksibel. Perusahaan memberikan sejumlah "poin" atau "budget" kepada karyawan, yang kemudian bisa mereka gunakan untuk memilih berbagai jenis tunjangan sesuai kebutuhan pribadi, seperti asuransi tambahan, keanggotaan gym, atau kursus online.

---

# Talent & Performance Management

Modul untuk mengelola dan mengembangkan bakat serta kinerja karyawan.

## Performance Management (Manajemen Kinerja)

**Keterangan:**  
Mengelola siklus penilaian kinerja, mulai dari penetapan tujuan (KPI/OKR), pengumpulan umpan balik (termasuk ulasan 360 derajat), hingga evaluasi akhir.

## Individual Development Plan (Rencana Pengembangan Individu)

**Keterangan:**  
Alat kolaboratif bagi karyawan dan manajer untuk merencanakan jalur karier dan pengembangan kompetensi. Fitur ini membantu melacak tujuan pelatihan dan kemajuan pengembangan diri karyawan.

---

# Report

Modul yang menyajikan data HR menjadi informasi yang berguna untuk pengambilan keputusan.

## Comprehensive Report (Laporan Komprehensif)

**Keterangan:**  
Menyediakan berbagai laporan standar HR yang siap pakai, seperti laporan absensi, laporan gaji, laporan demografi karyawan, dan laporan turnover.

## Talenta Insights

**Keterangan:**  
Lebih dari sekadar laporan statis, fitur ini menyajikan data dalam bentuk visual (grafik, diagram) yang interaktif untuk membantu manajemen menemukan tren dan wawasan penting dari data HR.

## Custom Dashboard/Analysis (Dasbor & Analisis Kustom)

**Keterangan:**  
Pengguna dapat membuat laporan atau dasbor mereka sendiri dengan memilih metrik dan filter yang diinginkan, memungkinkan analisis data yang lebih mendalam dan spesifik.

---

# Workflow & Integration

Kemampuan sistem untuk terhubung dengan perangkat lunak lain.

## Public API (API Publik)

**Keterangan:**  
Menyediakan Application Programming Interface (API) yang memungkinkan sistem HRIS ini untuk terhubung dan bertukar data dengan sistem lain yang digunakan perusahaan (misalnya, sistem akuntansi, ERP, atau aplikasi internal). Ini sangat penting untuk menciptakan ekosistem teknologi yang terintegrasi.

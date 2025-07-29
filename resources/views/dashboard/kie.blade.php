@extends('dashboard.layouts.main')
@section('container')
    <div class="page-heading">
        <h3>Komunikasi, Informasi, dan Edukasi</h3>
    </div>
    @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show col-12 col-lg-9" role="alert">
            {{ session('loginSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="container my-4">
                    <div class="container my-4">
                        <div class="row g-3 justify-content-center text-center">
                            @php
                                $menus = [
                                    '4 Pilar Pedoman Gizi Seimbang' => '1. Mengonsumsi makanan beragam:

Ini berarti mengonsumsi berbagai jenis makanan dari berbagai kelompok makanan (karbohidrat, protein, lemak, vitamin, dan mineral) untuk memenuhi kebutuhan nutrisi tubuh.

2. Membiasakan perilaku hidup bersih:

Menjaga kebersihan diri dan lingkungan, termasuk mencuci tangan sebelum makan, dapat mencegah masuknya bakteri dan kuman penyebab penyakit ke dalam tubuh.

3. Melakukan aktivitas fisik:

Aktivitas fisik, seperti olahraga, membantu membakar kalori, menjaga berat badan ideal, dan meningkatkan kesehatan jantung serta metabolisme tubuh.

4. Memantau berat badan:

Memantau berat badan secara teratur membantu mengidentifikasi masalah kelebihan atau kekurangan berat badan, yang dapat menjadi indikator ketidakseimbangan gizi.

',

                                    'Gizi Kurang' => "Status gizi kurang menunjukkan tubuh kekurangan energi dan zat gizi penting seperti protein, zat besi, dan vitamin. Pada WUS, hal ini berisiko menyebabkan anemia, gangguan menstruasi, serta masalah kesuburan dan kehamilan berisiko tinggi.
➤ Tindakan & Saran:
• Konsumsi makanan tinggi energi & protein: ikan, telur, tempe, kacang-kacangan, susu, nasi merah, ubi.
• Tambahkan minyak sehat (minyak kelapa, zaitun) ke dalam makanan untuk meningkatkan kalori.
• Minum tablet tambah darah (TTD) sesuai anjuran (1 tablet/minggu atau setiap hari jika anemia).
• Istirahat cukup dan hindari stres berlebihan.
• Rutin kontrol ke tenaga kesehatan dan pantau kenaikan berat badan setiap bulan.
➤ Rujukan jika diperlukan:
Jika IMT sangat rendah (<17) atau disertai gejala lemas, sesak, pusing berlebihan → rujuk ke petugas gizi Puskesmas untuk tatalaksana lanjutan.",

                                    'Gizi Normal' => "Status gizi normal mencerminkan keseimbangan antara asupan gizi dan kebutuhan tubuh. Ini adalah kondisi ideal bagi WUS untuk merencanakan kehamilan yang sehat, serta menunjang aktivitas dan kesuburan.
➤ Tindakan & Saran:
• Lanjutkan pola makan beragam, bergizi seimbang, dan sesuai porsi isi piringku (karbo 1/3, protein hewani/nabati 1/3, sayur & buah 1/3).
• Minum air putih minimal 8 gelas/hari.
• Lakukan aktivitas fisik rutin: jalan kaki, senam ringan, yoga, dll.
• Hindari makanan ultra-proses tinggi gula, garam, lemak.
• Konsumsi TTD jika belum hamil, atau sesuai program kesehatan reproduksi.
➤ Pemantauan:
Lakukan pemeriksaan berat badan, tinggi, dan lingkar lengan setiap 3 bulan atau sesuai anjuran tenaga kesehatan.",

                                    'Gizi Lebih' => "Status gizi lebih (overweight/obesitas) meningkatkan risiko gangguan kesuburan, diabetes gestasional, hipertensi dalam kehamilan, dan preeklamsia. Penanganan harus difokuskan pada pengaturan pola makan dan peningkatan aktivitas fisik.
➤ Tindakan & Saran:
• Batasi konsumsi makanan tinggi kalori: gorengan, makanan manis, minuman kemasan, makanan cepat saji.
• Perbanyak sayuran berserat tinggi, buah rendah gula (pepaya, apel, semangka).
• Ganti nasi putih dengan nasi merah, oats, jagung, dan hindari porsi berlebih.
• Rutin olahraga 3–5 kali/minggu selama 30 menit.
• Hindari minuman manis dan gula tambahan berlebih (<4 sdm/hari).
• Konsultasikan dengan tenaga gizi jika mengalami gangguan siklus haid atau kelelahan.
➤ Rujukan jika diperlukan:
Jika IMT ≥30 atau disertai tekanan darah tinggi, kadar gula darah tidak stabil → dirujuk ke fasilitas rujukan primer/sekunder untuk pengelolaan komprehensif.",

                                    'Aktivitas Fisik' => "Aktivitas fisik rutin menjaga keseimbangan energi, memperbaiki mood, meningkatkan kesuburan dan memperkuat imunitas.
➤ Rekomendasi:
• Jalan kaki 30 menit setiap hari
• Senam ringan 3x seminggu
• Peregangan saat bangun pagi dan sebelum tidur
• Aktivitas rumah tangga (menyapu, mengepel) juga dihitung aktif",

                                    'Lainnya (Diisi link YouTube)' => "
✅ Video 1: “PENTINGNYA GIZI PRAKONSEPSI BAGI WANITA USIA SUBUR (WUS)!”  
📺 <a href='https://youtu.be/bQnpFI2X3BE?si=3QD0YOqw-WuhP4m2' target='_blank'>https://youtu.be/bQnpFI2X3BE</a>

✅ Video 2: “Pentingnya Edukasi Gizi Pada Wanita Usia Subur”  
📺 <a href='https://youtu.be/lSyKBy8CY88?si=KqTyISyND7F9LGcg' target='_blank'>https://youtu.be/lSyKBy8CY88</a>

✅ Video 3: “Gizi Prakonsepsi dan Perencanaan Gizi Keluarga Dalam Kursus Pranikah”  
📺 <a href='https://youtu.be/jK29alFfqE4?si=CI4e_LKVdkoi6pbX' target='_blank'>https://youtu.be/jK29alFfqE4</a>
",
                                ];
                            @endphp

                            @foreach ($menus as $title => $content)
                                <div class="col-md-6 col-6">
                                    <button class="btn btn-primary w-100 py-3"
                                        type="button"
                                        onclick="showModal(`{{ addslashes(strtoupper($title)) }}`, `{!! addslashes(nl2br(e($content))) !!}`)">
                                        {{ strtoupper($title) }}
                                    </button>
                                </div>
                            @endforeach

                        </div>
                    </div>


                </div>

            </div>
            <!-- Modal Template -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModalLabel">Judul</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body" id="menuModalContent" style="font-size: 1.5rem;"></div>
    </div>
  </div>
</div>

    <script>
        function showModal(title, content) {
            const modalTitle = document.getElementById('menuModalLabel');
            const modalContent = document.getElementById('menuModalContent');

            modalTitle.innerHTML = title;
            modalContent.innerHTML = content;

            const modal = new bootstrap.Modal(document.getElementById('menuModal'));
            modal.show();
        }
    </script>
        @endsection

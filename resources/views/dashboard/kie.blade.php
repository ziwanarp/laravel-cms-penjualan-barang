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
                                $materi = [
                                    'Edukasi' => [
                                                'normal' => 'Status gizi Anda berada dalam kategori **normal**. Ini berarti asupan makanan dan aktivitas fisik Anda sudah seimbang. Namun, penting untuk tetap menjaga pola hidup sehat agar kondisi ini tetap terjaga.  
                                                Beberapa tips:
                                                - Konsumsi makanan bergizi seimbang (karbohidrat, protein, lemak sehat, sayur & buah).
                                                - Minum air putih minimal 8 gelas per hari.
                                                - Lakukan aktivitas fisik minimal 30 menit sehari.
                                                - Istirahat cukup dan kelola stres.

                                                Pantau berat badan dan tinggi badan secara berkala untuk memastikan kondisi tetap ideal.',

                                                    'kurang' => 'Status gizi Anda berada dalam kategori **kurang**. Ini berarti tubuh Anda mungkin kekurangan asupan energi atau zat gizi penting.  
                                                Beberapa langkah yang dapat dilakukan:
                                                - Tingkatkan konsumsi makanan tinggi kalori dan protein seperti telur, susu, daging tanpa lemak, dan kacang-kacangan.
                                                - Makan lebih sering, misalnya 5–6 kali sehari dalam porsi kecil.
                                                - Sertakan camilan sehat seperti buah kering, keju, atau roti gandum.
                                                - Periksa apakah ada gangguan penyerapan nutrisi (misalnya anemia, infeksi saluran cerna, dll).
                                                - Konsultasikan dengan petugas kesehatan atau ahli gizi jika berat badan sulit naik.

                                                Tujuan utama adalah meningkatkan massa tubuh secara sehat dan terkontrol.',

                                                    'lebih' => 'Status gizi Anda berada dalam kategori **lebih** (berat badan berlebih atau obesitas ringan). Ini berarti ada kelebihan energi yang disimpan dalam tubuh dalam bentuk lemak.  
                                                Langkah-langkah yang dapat membantu:
                                                - Kurangi makanan tinggi gula, garam, dan lemak jenuh (misalnya gorengan, makanan cepat saji, minuman manis).
                                                - Perbanyak konsumsi sayuran dan buah segar.
                                                - Lakukan olahraga teratur minimal 3–5 kali seminggu, seperti jalan cepat, bersepeda, atau berenang.
                                                - Hindari makan sambil menonton TV atau bermain gadget.
                                                - Usahakan tidur cukup dan hindari stres berlebih karena bisa memicu makan emosional.

                                                Dengan pola hidup sehat yang konsisten, Anda bisa menurunkan berat badan secara bertahap dan mencegah penyakit terkait obesitas seperti diabetes dan hipertensi.',
                                                ],

                                    'Asupan' => [
                                                'normal' => 'Karena status gizi Anda **normal**, penting untuk mempertahankan pola makan seimbang agar tubuh tetap sehat dan bertenaga.  
                                                Rekomendasi asupan nutrisi:
                                                - Karbohidrat kompleks: nasi merah, kentang, ubi, oatmeal.
                                                - Protein: ikan, ayam tanpa kulit, telur, tahu, tempe.
                                                - Sayuran dan buah-buahan beragam warna setiap hari.
                                                - Susu rendah lemak atau produk olahan susu.
                                                - Lemak sehat: alpukat, kacang-kacangan, minyak zaitun.

                                                Pastikan kebutuhan energi harian tercukupi dan jangan melewatkan sarapan.',

                                                    'kurang' => 'Status gizi Anda **kurang**, sehingga tubuh membutuhkan tambahan energi dan nutrisi untuk memperbaiki massa tubuh dan fungsi organ.  
                                                Rekomendasi asupan nutrisi:
                                                - Karbohidrat tinggi energi: nasi putih, roti, pasta, kentang.
                                                - Protein tinggi: telur, daging, ikan, susu full cream, kacang-kacangan.
                                                - Camilan sehat di antara waktu makan utama, seperti roti isi, pisang, atau kacang rebus.
                                                - Konsumsi minuman bergizi seperti susu atau smoothies buah plus yogurt.
                                                - Suplemen zat besi dan vitamin (jika direkomendasikan oleh tenaga medis).

                                                Konsistensi dan frekuensi makan yang cukup sangat penting untuk memperbaiki gizi kurang.',

                                                    'lebih' => 'Status gizi Anda **lebih**, sehingga disarankan untuk mengatur pola makan yang lebih rendah kalori dan lemak, namun tetap bergizi.  
                                                Rekomendasi asupan nutrisi:
                                                - Ganti nasi putih dengan nasi merah atau karbohidrat berserat tinggi lainnya.
                                                - Pilih sumber protein rendah lemak seperti ayam tanpa kulit, ikan kukus, tahu, dan tempe.
                                                - Hindari makanan tinggi gula dan lemak jenuh, seperti gorengan, makanan cepat saji, dan minuman manis.
                                                - Konsumsi sayuran hijau dan buah sebagai pengganti camilan.
                                                - Perbanyak minum air putih dan kurangi konsumsi minuman bersoda atau sirup.
                                                - Bila perlu, konsultasikan suplemen penunjang metabolisme dengan tenaga medis.

                                                Tujuan utama adalah menciptakan defisit kalori sehat dan menjaga keseimbangan nutrisi.',
                                                ],


                                    'Artikel' => [
                                                'fakta' => "✅ **Fakta Ilmiah tentang Gizi Wanita Usia Subur (WUS)**

                                                1. **Kebutuhan Zat Besi Meningkat**  
                                                Wanita usia subur membutuhkan asupan zat besi lebih tinggi karena mengalami menstruasi setiap bulan. Kekurangan zat besi dapat menyebabkan anemia yang berdampak buruk pada kesuburan dan kehamilan.

                                                2. **Asam Folat Wajib Dikonsumsi Sejak Sebelum Hamil**  
                                                WHO dan berbagai badan kesehatan menyarankan wanita mengonsumsi asam folat minimal 400 mcg/hari bahkan sebelum hamil untuk mencegah cacat tabung saraf pada janin.

                                                3. **Status Gizi Prakonsepsi Menentukan Kehamilan Sehat**  
                                                Berat badan yang terlalu rendah atau terlalu tinggi saat prakonsepsi dapat meningkatkan risiko komplikasi seperti kelahiran prematur, bayi berat lahir rendah (BBLR), atau preeklamsia.

                                                4. **Protein dan Mikronutrien Mempengaruhi Keseimbangan Hormon**  
                                                Asupan protein dan vitamin (seperti vitamin D dan B12) berperan dalam produksi hormon yang mengatur siklus menstruasi dan ovulasi.

                                                5. **Gizi Buruk di Masa Remaja Memengaruhi Generasi Berikutnya**  
                                                Studi menunjukkan bahwa malnutrisi pada remaja wanita berdampak pada keturunan mereka, menyebabkan risiko stunting dan gangguan perkembangan anak lebih tinggi.

                                                Sumber: WHO, UNICEF, Nutrition International, Kemenkes RI.",
                                                'mitos' => "Salah satu mitos yang banyak dipercaya adalah bahwa nanas bisa menyebabkan keguguran kandungan pada perempuan. Studi yang digalang Girl Effect mendapati perempuan di kawasan urban jarang menyarap pada pagi hari dan mengkonsumsi 'makanan tak bergizi' sepanjang hari. Celakanya kebanyakan meyakini pola makan semacam itu cukup untuk memenuhi kebutuhan gizi sehari-hari.

                                                Untuk meningkatkan asupan gizi pada kaum perempuan, Girl Effect meluncurkan aplikasi ponsel yang mencoba membangkitkan kesadaran makanan sehat lewat konten interaktif. Jika berhasil, aplikasi yang saat ini baru diluncurkan di Indonesia itu akan diujicoba di Filipina dan Nigeria.

                                                Sejumlah pakar mengatakan Indonesia menghadapi 'beban ganda malnutrisi' menyusul tingginya angka penduduk yang mengalami gejala kekerdilan dan kegemukan. Marion Roche, pakar kesehatan remaja di Nutrition International, mengatakan minimnya pengetahuian gizi di kalangan perempuan mengejutkan, terutama jika mengingat tingkat gizi balita yang banyak membaik.

                                                'Remaja perempuan tidak mengerti apa itu kesehatan. Kesehatan dipahami dengan tidak adanya penyakit,' ujarnya. 'Kita harus memberikan mereka pengetahuan tentang bagaimana membuat pilihan yang sehat.'.",
                                            ],
                                    'Rujukan' => [
                                        'faskes' => 'Informasi Faskes terdekat .',
                                    ],
                                ];
                            @endphp

                            <style>
                                .btn-outline-success {
                                    border-color: #32CD32;
                                    color: #32CD32;
                                }

                                .btn-outline-success:hover {
                                    background-color: #32CD32;
                                    color: #fff;
                                }

                                .btn-outline-primary {
                                    border-color: #00BFFF;
                                    color: #00BFFF;
                                }

                                .btn-outline-primary:hover {
                                    background-color: #00BFFF;
                                    color: #fff;
                                }

                                .btn-outline-info {
                                    border-color: #8A2BE2;
                                    color: #8A2BE2;
                                }

                                .btn-outline-info:hover {
                                    background-color: #8A2BE2;
                                    color: #fff;
                                }

                                .btn-outline-warning {
                                    border-color: #FF00FF;
                                    color: #FF00FF;
                                }

                                .btn-outline-warning:hover {
                                    background-color: #FF00FF;
                                    color: #fff;
                                }

                                .btn-outline-secondary {
                                    border-color: gray;
                                    color: gray;
                                }

                                .btn-outline-secondary:hover {
                                    background-color: gray;
                                    color: #fff;
                                }

                                .border-danger {
                                    border-width: 3px !important;
                                }

                                .rounded-4 {
                                    border-radius: 1rem;
                                }

                                h4 {
                                    font-weight: bold;
                                    color: white;
                                }
                            </style>

                            <div class="container my-5 text-white">
                                <div class="row gy-4 justify-content-center">

                                    {{-- EDUKASI --}}
                                    <div class="col-12 col-md-6">
                                        <div class="p-4 border border-danger rounded-4">
                                            <h4 class="text-center text-black">Edukasi</h4>
                                            <div class="d-flex justify-content-around mt-3">
                                                @foreach (['normal', 'kurang', 'lebih'] as $item)
                                                    <button class="btn btn-xl btn-primary"
                                                        onclick="showModal('Edukasi - {{ ucfirst($item) }}', `{!! nl2br($materi['Edukasi'][$item]) !!}`)">
                                                        {{ ucfirst($item) }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ASUPAN NUTRISI --}}
                                    <div class="col-12 col-md-6">
                                        <div class="p-4 border border-danger rounded-4">
                                            <h4 class="text-center text-black">Asupan Nutrisi & Suplemen</h4>
                                            <div class="d-flex justify-content-around mt-3">
                                                @foreach (['normal', 'kurang', 'lebih'] as $item)
                                                    <button class="btn btn-xl btn-primary"
                                                        onclick="showModal('Asupan - {{ ucfirst($item) }}', `{!! nl2br($materi['Asupan'][$item]) !!}`)">
                                                        {{ ucfirst($item) }}
                                                    </button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- VIDEO GIZI --}}
                                    <div class="col-12 col-md-6">
                                        <div class="p-4 border border-danger rounded-4">
                                            <h4 class="text-center text-black">Video Gizi</h4>
                                            <div class="text-center mt-3">
                                                <button class="btn btn-xl btn-primary"
                                                    onclick="showYoutubeModal('Video Gizi', [
                                                            'https://www.youtube.com/embed/bQnpFI2X3BE',
                                                            'https://www.youtube.com/embed/lSyKBy8CY88',
                                                            'https://www.youtube.com/embed/jK29alFfqE4',
                                                            'https://www.youtube.com/watch?v=Ifit0o20zqw',
                                                            'https://www.youtube.com/live/ziQlrL51j6k?si=TWiVclszHeiMxO5z',
                                                            'https://www.youtube.com/JvEs4ZT7e6Y?si=IRSJhhLVpPhkJbWR',
                                                            'https://www.youtube.com/zqpinGFvivg?si=tSyC8g631-tQRXbF',
                                                            'https://www.youtube.com/1bcI39ssaaw?si=8hkZVcGBpYY8NOfa',
                                                            'https://www.youtube.com/8WQHKD8-ooc?si=EGFN1IUOneTfTBkL',
                                                        ])">
                                                    Link YouTube
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- ARTIKEL --}}
                                    <div class="col-12 col-md-6">
                                        <div class="p-4 border border-danger rounded-4">
                                            <h4 class="text-center text-black">Artikel</h4>
                                            <div class="d-flex justify-content-around mt-3">
                                                <button class="btn btn-xl btn-primary"
                                                    onclick="showModal('Artikel - Fakta', `{!! nl2br($materi['Artikel']['fakta']) !!}`)">
                                                    Fakta
                                                </button>
                                                <button class="btn btn-xl btn-primary"
                                                    onclick="showModal('Artikel - Mitos', `{!! nl2br($materi['Artikel']['mitos']) !!}`)">
                                                    Mitos
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- RUJUKAN --}}
                                    <div class="col-12 col-md-6">
                                        <div class="p-4 border border-danger rounded-4">
                                            <h4 class="text-center text-black">Rujukan</h4>
                                            <div class="text-center mt-3">
                                                <button class="btn btn-xl btn-primary"
                                                    onclick="showModal('Faskes Terdekat', `{!! nl2br($materi['Rujukan']['faskes']) !!}`)">
                                                    Faskes Terdekat
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
            {{-- MODAL --}}
            <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="menuModalLabel">Judul</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body" id="menuModalContent" style="font-size: 1.3rem;"></div>
                    </div>
                </div>
            </div>

            {{-- Modal Video --}}
            <div class="modal fade" id="ytModal" tabindex="-1" aria-labelledby="ytModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ytModalLabel">Judul Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div id="ytVideoList" class="mb-4"></div>
                        <div class="ratio ratio-16x9">
                        <iframe id="ytIframe" src="" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
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

                function extractVideoId(url) {
                    try {
                        const parsed = new URL(url);

                        if (parsed.hostname === 'www.youtube.com') {
                            if (parsed.pathname === '/watch') {
                                return parsed.searchParams.get('v');
                            } else if (parsed.pathname.startsWith('/embed/')) {
                                return parsed.pathname.split('/embed/')[1];
                            } else if (parsed.pathname.startsWith('/live/')) {
                                return parsed.pathname.split('/live/')[1];
                            } else {
                                // fallback for unknown paths
                                return parsed.pathname.slice(1).split('/')[0];
                            }
                        }

                        if (parsed.hostname === 'youtu.be') {
                            return parsed.pathname.slice(1);
                        }

                        return null;
                    } catch {
                        return null;
                    }
                }


                function toEmbedUrl(url) {
                    const id = extractVideoId(url);
                    return id ? `https://www.youtube.com/embed/${id}` : null;
                }

                function showYoutubeModal(title, urls) {
                    document.getElementById('ytModalLabel').innerText = title;
                    const ytList = document.getElementById('ytVideoList');
                    ytList.innerHTML = '';

                    urls.forEach((url, index) => {
                        const embedUrl = toEmbedUrl(url);
                        if (!embedUrl) return;

                        const btn = document.createElement('button');
                        btn.className = 'btn btn-primary text-black btn-sm me-2 mb-2';
                        btn.innerText = `Video ${index + 1}`;
                        btn.onclick = () => {
                            document.getElementById('ytIframe').src = embedUrl;
                        };
                        ytList.appendChild(btn);
                    });

                    document.getElementById('ytIframe').src = '';
                    const modal = new bootstrap.Modal(document.getElementById('ytModal'));
                    modal.show();
                }

                document.getElementById('ytModal').addEventListener('hidden.bs.modal', function () {
                    document.getElementById('ytIframe').src = '';
                });
            </script>
        @endsection

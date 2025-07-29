<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Imt;

class ImtController extends Controller
{
    public function index()
    {
        return view('dashboard.imt.index', [
            'title' => 'Imt',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'usia' => 'required|numeric|min:0',
            'tb'   => 'required|numeric|min:0',
            'bb'   => 'required|numeric|min:0',
            'jk'   => 'required'
        ]);

        $usia = $request->usia;
        $bb   = $request->bb;
        $tb   = $request->tb / 100; // konversi ke meter

        $imt = $bb / ($tb * $tb);
        $imt = round($imt, 2);

        // Default status
        $statusImt = '-';
        $statusGizi = '-';

        // Penilaian berdasarkan usia
        // if ($usia < 5) {
        //     $statusImt  = 'Gunakan grafik WHO (BB/TB)';
        //     $statusGizi = 'Rujuk standar z-score anak balita';
        // } elseif ($usia >= 5 && $usia < 18) {
        //     // Anak dan remaja
        //     if ($imt < 15) {
        //         $statusImt  = 'Berat badan kurang (anak/remaja)';
        //         $statusGizi = 'Gizi Kurang';
        //     } elseif ($imt >= 15 && $imt <= 22) {
        //         $statusImt  = 'Berat badan normal (anak/remaja)';
        //         $statusGizi = 'Gizi Baik';
        //     } elseif ($imt > 22 && $imt <= 25) {
        //         $statusImt  = 'Kelebihan berat badan (anak/remaja)';
        //         $statusGizi = 'Gizi Lebih';
        //     } else {
        //         $statusImt  = 'Obesitas (anak/remaja)';
        //         $statusGizi = 'Obesitas';
        //     }
        // } else {

        if($usia > 14 && $request->jk == 'P'){
            // usia subur wanita (≥ 15)
            $usia_subur = 1;
            if ($imt < 18.5 || $request->lila < 23.5) {
                $statusImt          = 'Berat Badan Kurang';
                $statusGizi         = 'Gizi Kurang';
                $penjelasan         = 'Gizi kurang terjadi saat tubuh tidak mendapat cukup energi dan zat gizi penting seperti protein, zat besi, dan vitamin. Pada WUS, ini meningkatkan risiko anemia, sulit hamil, keguguran, serta bayi lahir dengan berat rendah (BBLR).';
                $tanda_umum         = '•	Wajah pucat atau tampak lesu
                                    •	Berat badan rendah
                                    •	Sering pusing, cepat lelah
                                    •	Siklus haid terganggu
                                    •	Mudah sakit atau infeksi';
                $rekomendasi_asupan = '1.	Tinggi Energi & Protein
                                        o	Makan 3 kali sehari + 2 camilan bergizi
                                        o	Konsumsi telur, ikan, ayam, tahu, tempe, daging, susu
                                        2.	Makanan sumber zat besi
                                        o	Hati ayam, bayam, kangkung, kacang-kacangan
                                        3.	Makanan padat energi
                                        o	Tambahkan minyak kelapa, santan, atau keju dalam makanan
                                        ';
                $tindakan_pendukung  = '•	Minum Tablet Tambah Darah (TTD) 1 tablet per minggu
                                        •	Istirahat cukup (≥7 jam/hari)
                                        •	Rutin timbang berat badan dan ukur LILA setiap bulan
                                        •	Konsultasi ke bidan/petugas gizi jika tidak naik berat badan dalam 1 bulan
                                        ';
            } elseif ($imt >= 18.5 && $imt <= 24.9 && $request->lila >= 23.5) {
                $statusImt  = 'Berat Badan Ideal';
                $statusGizi = 'Gizi Normal';
                $penjelasan = 'Status gizi normal berarti keseimbangan antara kebutuhan dan asupan gizi terpenuhi. Ini kondisi ideal untuk merencanakan kehamilan, menjaga kesuburan, dan memperkuat daya tahan tubuh.';
                $tanda_umum = '•	Berat dan tinggi badan proporsional
                                •	Energi cukup untuk aktivitas harian
                                •	Haid teratur
                                •	Tidak mudah lelah/sakit
                                •	Hasil skrining gizi dalam batas sehat
                                ';
                $rekomendasi_asupan = '1.	Isi Piringku Seimbang
                                    o	1/3 karbohidrat: nasi, kentang, jagung
                                    o	1/3 protein: ayam, ikan, telur, tempe
                                    o	1/3 sayur dan buah
                                    2.	Minum air putih minimal 8 gelas/hari
                                    3.	Batasi gula, garam, dan lemak
                                    o	Gula <4 sdm/hari, Garam <1 sdt, Lemak <5 sdm/hari
                                    ';
                $tindakan_pendukung = '•	Aktivitas fisik minimal 30 menit setiap hari
                                    •	Tidak merokok dan tidak konsumsi alkohol
                                    •	Istirahat teratur dan kelola stres
                                    •	Rutin cek kesehatan dan gizi tiap 3 bulan
                                    ';

            } else {
                $statusImt  = 'Berat Badan Lebih';
                $statusGizi = 'Gizi Lebih';
                $penjelasan = 'Gizi lebih berarti kelebihan asupan kalori dan lemak dibanding kebutuhan. Ini dapat menyebabkan gangguan kesuburan, sindrom ovarium polikistik (PCOS), hipertensi, diabetes gestasional, dan komplikasi kehamilan';
                $tanda_umum = '•	Berat badan di atas ideal
                                •	Lingkar lengan besar
                                •	Napas mudah sesak, cepat lelah
                                •	Siklus haid tidak teratur
                                •	Kolesterol atau tekanan darah tinggi
                                ';
                $rekomendasi_asupan = '1.	Atur Porsi dan Jadwal Makan
                                        o	Makan 3 kali sehari, hindari ngemil tinggi kalori
                                        o	Makan perlahan, hindari makan sambil menonton/bermain HP
                                        2.	Pilih makanan tinggi serat, rendah lemak
                                        o	Perbanyak sayur, buah, oatmeal, nasi merah
                                        o	Kurangi gorengan, makanan manis, fast food
                                        3.	Minum cukup air, hindari minuman manis
                                        '; 
                $tindakan_pendukung = '•	Olahraga ringan hingga sedang 4–5x/minggu (jalan kaki, senam, bersepeda)
                                        •	Pantau berat badan dan IMT secara berkala
                                        •	Konsultasi ke petugas gizi jika berat badan sulit turun
                                        ';
                 
            }
        } else {
             $usia_subur = 0;
             if ($imt < 18.5 || $request->lila < 23.5) {
                $statusImt  = 'Berat Badan Kurang';
                $statusGizi = 'Gizi Kurang';
                $penjelasan = 'Status gizi kurang menunjukkan tubuh kekurangan energi dan zat gizi penting seperti protein, zat besi, dan vitamin. Pada WUS, hal ini berisiko menyebabkan anemia, gangguan menstruasi, serta masalah kesuburan dan kehamilan berisiko tinggi.';
                $tindakan   = '•	Konsumsi makanan tinggi energi & protein: ikan, telur, tempe, kacang-kacangan, susu, nasi merah, ubi.
                                •	Tambahkan minyak sehat (minyak kelapa, zaitun) ke dalam makanan untuk meningkatkan kalori.
                                •	Minum tablet tambah darah (TTD) sesuai anjuran (1 tablet/minggu atau setiap hari jika anemia).
                                •	Istirahat cukup dan hindari stres berlebihan.
                                •	Rutin kontrol ke tenaga kesehatan dan pantau kenaikan berat badan setiap bulan.';
                $rujukan    = 'Jika IMT sangat rendah (<17) atau disertai gejala lemas, sesak, pusing berlebihan → rujuk ke petugas gizi Puskesmas untuk tatalaksana lanjutan.';
            } elseif ($imt >= 18.5 && $imt <= 24.9 && $request->lila >= 23.5) {
                $statusImt  = 'Berat Badan Ideal';
                $statusGizi = 'Gizi Normal';
                $penjelasan = 'Status gizi normal mencerminkan keseimbangan antara asupan gizi dan kebutuhan tubuh. Ini adalah kondisi ideal bagi WUS untuk merencanakan kehamilan yang sehat, serta menunjang aktivitas dan kesuburan.';
                $tindakan   = '•	Lanjutkan pola makan beragam, bergizi seimbang, dan sesuai porsi isi piringku (karbo 1/3, protein hewani/nabati 1/3, sayur & buah 1/3).
                                •	Minum air putih minimal 8 gelas/hari.
                                •	Lakukan aktivitas fisik rutin: jalan kaki, senam ringan, yoga, dll.
                                •	Hindari makanan ultra-proses tinggi gula, garam, lemak.
                                •	Konsumsi TTD jika belum hamil, atau sesuai program kesehatan reproduksi.
                                ';
                $rujukan    = 'Lakukan pemeriksaan berat badan, tinggi, dan lingkar lengan setiap 3 bulan atau sesuai anjuran tenaga kesehatan.';
            } else {
                $statusImt  = 'Berat Badan Lebih';
                $statusGizi = 'Gizi Lebih';
                $penjelasan = 'Status gizi lebih (overweight/obesitas) meningkatkan risiko gangguan kesuburan, diabetes gestasional, hipertensi dalam kehamilan, dan preeklamsia. Penanganan harus difokuskan pada pengaturan pola makan dan peningkatan aktivitas fisik.';
                $tindakan   = '•	Batasi konsumsi makanan tinggi kalori: gorengan, makanan manis, minuman kemasan, makanan cepat saji.
                                •	Perbanyak sayuran berserat tinggi, buah rendah gula (pepaya, apel, semangka).
                                •	Ganti nasi putih dengan nasi merah, oats, jagung, dan hindari porsi berlebih.
                                •	Rutin olahraga 3–5 kali/minggu selama 30 menit.
                                •	Hindari minuman manis dan gula tambahan berlebih (<4 sdm/hari).
                                •	Konsultasikan dengan tenaga gizi jika mengalami gangguan siklus haid atau kelelahan.';
                $rujukan    = 'Jika IMT ≥30 atau disertai tekanan darah tinggi, kadar gula darah tidak stabil → dirujuk ke fasilitas rujukan primer/sekunder untuk pengelolaan komprehensif.';
            }
        }

        // Simpan data
        $validatedData['usia_subur']                = $usia_subur;
        $validatedData['lila']                      = $request->lila;

        $validatedData['penjelasan']                = $penjelasan ?? null;
        $validatedData['tindakan']                  = $tindakan ?? null;
        $validatedData['rujukan']                   = $rujukan ?? null;
        
        $validatedData['tanda_umum']                = $tanda_umum ?? null;
        $validatedData['rekomendasi_asupan']        = $rekomendasi_asupan ?? null;
        $validatedData['tindakan_pendukung']        = $tindakan_pendukung ?? null;

        $validatedData['status1']                   = $statusImt;
        $validatedData['status2']                   = $statusGizi;
        $validatedData['gizi']                      = $statusGizi;
        $validatedData['imt']                       = $imt;

        Imt::create($validatedData);

        return view('dashboard.imt.hasil', [
            'title'     => 'Hasil IMT',
            'data'      => $validatedData,
            'grafik'    => Imt::where('nama', $request->nama)->get(),
        ]);
    }

    public function reportimt(){
         return view('dashboard.imt.reportimt', [
            'title' => 'Report IMT',
            'imts' => Imt::all(),
        ]);
    }




}

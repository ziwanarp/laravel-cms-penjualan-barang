<?php

namespace App\Http\Controllers;

use App\Models\Imt;
use App\Models\minggu1;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => User::all(),
            'imt'   => Imt::all(),
        ]);
    }

    public function kie(){
         return view('dashboard.kie', [
            'title' => 'KIE',
        ]);
    }

    public function pemantauan(){
        // dd(Imt::orderBy('id', 'desc')->first());
         return view('dashboard.pemantauan', [
            'title' => 'Pemantauan',
            'imt'   => Imt::where('catatan', auth()->user()->id)->orderBy('id', 'desc')->first()
        ]);
    }

    public function catatanMingguan(){
        // dd(Imt::orderBy('id', 'desc')->first());
         return view('dashboard.catatan', [
            'title' => 'Catatan Mingguan',
            'users'   => Imt::all()
        ]);
    }

    public function catatanMingguanInsert(Request $request){
        $now = Carbon::now();
        // =====================
        // CEK MINGGU 1
        // =====================
        $minggu1 = DB::table('minggu1s')
            ->where('nama', $request->user)
            ->orderByDesc('created_at')
            ->first();

        if (!$minggu1) {
            // belum pernah isi minggu 1
            return view('dashboard.catatanInput1', [
                'title' => 'Catatan Mingguan',
                'users' => DB::table('imts')->where('nama', $request->user)->first()
            ]);
        }

        // cek apakah sudah 7 hari
        if ($now->diffInDays($minggu1->created_at) < 7) {
            return redirect('/catatan')->with('error','Belum 7 hari sejak pengisian terakhir!');
        }

        // =====================
        // CEK MINGGU 2
        // =====================
        $minggu2 = DB::table('minggu2s')
            ->where('nama', $request->user)
            ->orderByDesc('created_at')
            ->first();

        if (!$minggu2) {
            return view('dashboard.catatanInput2', [
                'title' => 'Catatan Mingguan',
                'users' => DB::table('imts')->where('nama', $request->user)->first()
            ]);
        }

        // cek 7 hari minggu 2
        if ($now->diffInDays($minggu2->created_at) < 7) {
            return redirect('/catatan')->with('error','Belum 7 hari sejak pengisian terakhir!');
        }

        // =====================
        // CEK MINGGU 3
        // =====================
        $minggu3 = DB::table('minggu3s')
            ->where('nama', $request->user)
            ->orderByDesc('created_at')
            ->first();

        if (!$minggu3) {
            return view('dashboard.catatanInput3', [
                'title' => 'Catatan Mingguan',
                'users' => DB::table('imts')->where('nama', $request->user)->first()
            ]);
        }

        if ($now->diffInDays($minggu3->created_at) < 7) {
            return redirect('/catatan')->with('error','Belum 7 hari sejak pengisian terakhir!');
        }

        // =====================
        // CEK MINGGU 4
        // =====================
        $minggu4 = DB::table('minggu4s')
            ->where('nama', $request->user)
            ->orderByDesc('created_at')
            ->first();

        if (!$minggu4) {
            return view('dashboard.catatanInput4', [
                'title' => 'Catatan Mingguan',
                'users' => DB::table('imts')->where('nama', $request->user)->first()
            ]);
        }

        return redirect('/catatan')->with('error','Data sudah terisi sampai minggu ke 4!');
        
    }
            
    public function minggu1insert(Request $request){
         DB::table('minggu1s')->insert([
            'nama' => $request->nama,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'imt' => $request->imt,
            'frekuensi_makan' => $request->frekuensi_makan,
            'frekuensi_makan_lainnya' => $request->frekuensi_makan_lainnya,
            'gorengan' => $request->gorengan,
            'manis' => $request->manis,
            'fastfood' => $request->fastfood,
            'sayur' => $request->sayur,
            'buah' => $request->buah,
            'porsi' => $request->porsi,
            'porsi_lainnya' => $request->porsi_lainnya,
            'waktu_makan' => $request->waktu_makan,
            'waktu_makan_lainnya' => $request->waktu_makan_lainnya,
            'olahraga' => $request->olahraga,
            'jenis_olahraga' => json_encode($request->jenis_olahraga),
            'jenis_olahraga_lainnya' => $request->jenis_olahraga_lainnya,
            'frekuensi_olahraga' => $request->frekuensi_olahraga,
            'frekuensi_olahraga_lainnya' => $request->frekuensi_olahraga_lainnya,
            'durasi' => $request->durasi,
            'durasi_lainnya' => $request->durasi_lainnya,
            'tidur' => $request->tidur,
            'tidur_lainnya' => $request->tidur_lainnya,
            'air' => $request->air,
            'air_lainnya' => $request->air_lainnya,
            'ngemil' => $request->ngemil,
            'ngemil_lainnya' => $request->ngemil_lainnya,
            'keluhan' => $request->keluhan,
            'catatan' => $request->catatan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


       return redirect('/catatan')->with('success','Data Minggu 1 berhasil disimpan');

    }

    public function minggu2insert(Request $request){
         DB::table('minggu2s')->insert([
            'nama' => $request->nama,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'imt' => $request->imt,
            'frekuensi_makan' => $request->frekuensi_makan,
            'frekuensi_makan_lainnya' => $request->frekuensi_makan_lainnya,
            'gorengan' => $request->gorengan,
            'manis' => $request->manis,
            'fastfood' => $request->fastfood,
            'sayur' => $request->sayur,
            'buah' => $request->buah,
            'porsi' => $request->porsi,
            'porsi_lainnya' => $request->porsi_lainnya,
            'waktu_makan' => $request->waktu_makan,
            'waktu_makan_lainnya' => $request->waktu_makan_lainnya,
            'olahraga' => $request->olahraga,
            'jenis_olahraga' => json_encode($request->jenis_olahraga),
            'jenis_olahraga_lainnya' => $request->jenis_olahraga_lainnya,
            'frekuensi_olahraga' => $request->frekuensi_olahraga,
            'frekuensi_olahraga_lainnya' => $request->frekuensi_olahraga_lainnya,
            'durasi' => $request->durasi,
            'durasi_lainnya' => $request->durasi_lainnya,
            'tidur' => $request->tidur,
            'tidur_lainnya' => $request->tidur_lainnya,
            'air' => $request->air,
            'air_lainnya' => $request->air_lainnya,
            'ngemil' => $request->ngemil,
            'ngemil_lainnya' => $request->ngemil_lainnya,
            'keluhan' => $request->keluhan,
            'catatan' => $request->catatan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


       return redirect('/catatan')->with('success','Data Minggu 2 berhasil disimpan');

    }

    public function minggu3insert(Request $request){
         DB::table('minggu3s')->insert([
            'nama' => $request->nama,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'imt' => $request->imt,
            'frekuensi_makan' => $request->frekuensi_makan,
            'frekuensi_makan_lainnya' => $request->frekuensi_makan_lainnya,
            'gorengan' => $request->gorengan,
            'manis' => $request->manis,
            'fastfood' => $request->fastfood,
            'sayur' => $request->sayur,
            'buah' => $request->buah,
            'porsi' => $request->porsi,
            'porsi_lainnya' => $request->porsi_lainnya,
            'waktu_makan' => $request->waktu_makan,
            'waktu_makan_lainnya' => $request->waktu_makan_lainnya,
            'olahraga' => $request->olahraga,
            'jenis_olahraga' => json_encode($request->jenis_olahraga),
            'jenis_olahraga_lainnya' => $request->jenis_olahraga_lainnya,
            'frekuensi_olahraga' => $request->frekuensi_olahraga,
            'frekuensi_olahraga_lainnya' => $request->frekuensi_olahraga_lainnya,
            'durasi' => $request->durasi,
            'durasi_lainnya' => $request->durasi_lainnya,
            'tidur' => $request->tidur,
            'tidur_lainnya' => $request->tidur_lainnya,
            'air' => $request->air,
            'air_lainnya' => $request->air_lainnya,
            'ngemil' => $request->ngemil,
            'ngemil_lainnya' => $request->ngemil_lainnya,
            'keluhan' => $request->keluhan,
            'catatan' => $request->catatan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


       return redirect('/catatan')->with('success','Data Minggu 3 berhasil disimpan');

    }

    public function minggu4insert(Request $request){
         DB::table('minggu4s')->insert([
            'nama' => $request->nama,
            'bb' => $request->bb,
            'tb' => $request->tb,
            'imt' => $request->imt,
            'frekuensi_makan' => $request->frekuensi_makan,
            'frekuensi_makan_lainnya' => $request->frekuensi_makan_lainnya,
            'gorengan' => $request->gorengan,
            'manis' => $request->manis,
            'fastfood' => $request->fastfood,
            'sayur' => $request->sayur,
            'buah' => $request->buah,
            'porsi' => $request->porsi,
            'porsi_lainnya' => $request->porsi_lainnya,
            'waktu_makan' => $request->waktu_makan,
            'waktu_makan_lainnya' => $request->waktu_makan_lainnya,
            'olahraga' => $request->olahraga,
            'jenis_olahraga' => json_encode($request->jenis_olahraga),
            'jenis_olahraga_lainnya' => $request->jenis_olahraga_lainnya,
            'frekuensi_olahraga' => $request->frekuensi_olahraga,
            'frekuensi_olahraga_lainnya' => $request->frekuensi_olahraga_lainnya,
            'durasi' => $request->durasi,
            'durasi_lainnya' => $request->durasi_lainnya,
            'tidur' => $request->tidur,
            'tidur_lainnya' => $request->tidur_lainnya,
            'air' => $request->air,
            'air_lainnya' => $request->air_lainnya,
            'ngemil' => $request->ngemil,
            'ngemil_lainnya' => $request->ngemil_lainnya,
            'keluhan' => $request->keluhan,
            'catatan' => $request->catatan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


       return redirect('/catatan')->with('success','Data Minggu 4 berhasil disimpan');

    }
}

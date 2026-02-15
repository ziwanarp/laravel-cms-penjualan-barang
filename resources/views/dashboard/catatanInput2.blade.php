@extends('dashboard.layouts.main')
@section('container')
    <div class="page-heading">
        <h3>Selamat Datang, {{ auth()->user()->name }}</h3>
    </div>
    @if (session()->has('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show col-12 col-lg-9" role="alert">
            {{ session('loginSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Input Data Pemantauan Minggu ke 2</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/catatan/minggu2" method="post" class="form form-horizontal">
                                @csrf

                                <div class="form-body">
                                    <div class="row">



                                        {{-- ================================= A --}}
                                        <div class="col-12 mt-4">
                                            <h5 class="fw-bold">A. Pengukuran Antropometri</h5>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label>Nama Pasien</label>
                                            <input type="text"  name="nama" value="{{ $users->nama }}"
                                                class="form-control" readonly>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label>1. Berat badan minggu ini (kg)</label>
                                            <input type="number" step="0.1" name="bb" id="bb"
                                                class="form-control" required>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label>2. IMT (otomatis sistem)</label>
                                            <input type="text" name="imt" id="imt" value="{{ $users->imt }}" class="form-control"
                                                readonly>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label>Tinggi badan (cm)</label>
                                            <input type="number" name="tb" id="tb" class="form-control"
                                                required>
                                        </div>


                                        {{-- ================================= B --}}
                                        <div class="col-12 mt-5">
                                            <h5 class="fw-bold">B. Pola Makan</h5>
                                        </div>

                                        {{-- 1 --}}
                                        <div class="col-12 mt-3">
                                            <label>1. Frekuensi makan per hari:</label>
                                        </div>
                                        @foreach (['2x', '3x', '>3x'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="frekuensi_makan"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="frekuensi_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>


                                        {{-- 2 --}}
                                        <div class="col-12 mt-4">
                                            <label>2. Dalam 1 minggu terakhir, apakah sering mengonsumsi:</label>
                                        </div>

                                        @php $opsi3 = ['Sering','Kadang-kadang','Tidak pernah']; @endphp

                                        {{-- a --}}
                                        <div class="col-12 mt-3"><strong>a. Gorengan / makanan berlemak</strong></div>
                                        @foreach ($opsi3 as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="gorengan"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach

                                        {{-- b --}}
                                        <div class="col-12 mt-3"><strong>b. Makanan manis / minuman manis</strong></div>
                                        @foreach ($opsi3 as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="manis"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach

                                        {{-- c --}}
                                        <div class="col-12 mt-3"><strong>c. Fast food / makanan instan</strong></div>
                                        @foreach ($opsi3 as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="fastfood"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach

                                        {{-- d --}}
                                        <div class="col-12 mt-3"><strong>d. Sayur setiap hari</strong></div>
                                        @foreach (['Setiap hari', 'Tidak setiap hari', 'Hampir tidak pernah'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="sayur"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach

                                        {{-- e --}}
                                        <div class="col-12 mt-3"><strong>e. Buah setiap hari</strong></div>
                                        @foreach (['Setiap hari', 'Tidak setiap hari', 'Hampir tidak pernah'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="buah"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach


                                        {{-- 3 --}}
                                        <div class="col-12 mt-4">
                                            <label>3. Porsi makan Anda:</label>
                                        </div>
                                        @foreach (['Berlebihan (makan terlalu banyak)', 'Cukup (porsi seimbang)', 'Kurang (porsi terlalu sedikit)'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="porsi"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="porsi_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>


                                        {{-- 4 --}}
                                        <div class="col-12 mt-4">
                                            <label>4. Waktu makan malam biasanya:</label>
                                        </div>
                                        @foreach (['Sebelum jam 19.00', 'Jam 19.00–21.00', 'Di atas jam 21.00'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="waktu_makan"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="waktu_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>


                                        {{-- ================================= C --}}
                                        <div class="col-12 mt-5">
                                            <h5 class="fw-bold">C. Aktivitas Fisik</h5>
                                        </div>

                                        {{-- 1 --}}
                                        <div class="col-12 mt-3">
                                            <label>1. Apakah berolahraga minggu ini?</label>
                                        </div>
                                        @foreach (['Ya', 'Tidak'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="olahraga"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach

                                        {{-- 2 --}}
                                        <div class="col-12 mt-4">
                                            <label>2. Jika ya, jenis:</label>
                                        </div>
                                        @foreach (['Jalan kaki', 'Senam', 'Jogging', 'Bersepeda'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="checkbox" name="jenis_olahraga[]"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="jenis_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>

                                        {{-- 3 --}}
                                        <div class="col-12 mt-4">
                                            <label>3. Frekuensi:</label>
                                        </div>
                                        @foreach (['1–2x/minggu', '3–5x/minggu', '>5x/minggu'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="frekuensi_olahraga"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="frekuensi_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>

                                        {{-- 4 --}}
                                        <div class="col-12 mt-4">
                                            <label>4. Durasi:</label>
                                        </div>
                                        @foreach (['<30 menit', '30–60 menit', '>60 menit'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="durasi"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="durasi_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>


                                        {{-- ================================= D --}}
                                        <div class="col-12 mt-5">
                                            <h5 class="fw-bold">D. Pola Hidup</h5>
                                        </div>

                                        {{-- 1 --}}
                                        <div class="col-12 mt-3">
                                            <label>1. Lama tidur per hari:</label>
                                        </div>
                                        @foreach (['<6 jam', '6–7 jam', '>7 jam'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="tidur"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="tidur_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>

                                        {{-- 2 --}}
                                        <div class="col-12 mt-4">
                                            <label>2. Konsumsi air putih:</label>
                                        </div>
                                        @foreach (['<8 gelas', '≥8 gelas'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="air"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="air_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>

                                        {{-- 3 --}}
                                        <div class="col-12 mt-4">
                                            <label>3. Kebiasaan ngemil:</label>
                                        </div>
                                        @foreach (['Sering', 'Kadang-kadang', 'Tidak pernah'] as $opt)
                                            <div class="col-12 form-check">
                                                <input class="form-check-input" type="radio" name="ngemil"
                                                    value="{{ $opt }}">
                                                <label class="form-check-label">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-4 mt-2">
                                            <input type="text" name="ngemil_lainnya" class="form-control"
                                                placeholder="Lainnya...">
                                        </div>


                                        {{-- ================================= E --}}
                                        <div class="col-12 mt-5">
                                            <h5 class="fw-bold">E. Keluhan / Catatan</h5>
                                        </div>

                                        <div class="col-12 form-check">
                                            <input class="form-check-input" type="radio" name="keluhan"
                                                value="Tidak ada">
                                            <label class="form-check-label">Tidak ada</label>
                                        </div>

                                        <div class="col-12 form-check">
                                            <input class="form-check-input" type="radio" name="keluhan"
                                                value="Ada">
                                            <label class="form-check-label">Ada</label>
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <textarea name="catatan" class="form-control" placeholder="Jika ada, sebutkan..."></textarea>
                                        </div>

                                    </div>


                                    {{-- SUBMIT --}}
                                    <div class="col-sm-12 d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@extends('dashboard.layouts.main')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <div class="col-md-6 col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hasil Analisis IMT Otomatis</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="/imt" method="get" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    
                                    <div class="col-sm-12 d-flex justify-content-center mb-3">
                                        <img src="{{ asset('assets/images/hasil.png') }}" alt="" class="w-50">
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-xl me-1 mb-1">IMT {{ $data['imt'] }}</button>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <h4 class="card-title">Status IMT: <i><u>{{ $data['status1'] }}</u></i></h4>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <h4 class="card-title">Status Gizi: <i><u>{{ $data['status2'] }}</u></i></h4>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Grafik Analisis IMT Dengan nama <b class="text-danger">{{ $data['nama'] }}</b> </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                              <canvas id="imtChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (!empty( $data['penjelasan'] ))
            <div class="col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Penjelasan  </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body" style="font-size: 1.5rem;">
                                {{ $data['penjelasan'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty( $data['tindakan'] ))
            <div class="col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tindakan dan Saran </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body" style="font-size: 1.5rem;">
                                {{ $data['tindakan'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty( $data['rujukan'] ))
            <div class="col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rujukan </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body" style="font-size: 1.5rem;">
                                {{ $data['rujukan'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty( $data['tanda_umum'] ))
            <div class="col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tanda - Tanda Umum </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body" style="font-size: 1.5rem;">
                                {{ $data['tanda_umum'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty( $data['rekomendasi_asupan'] ))
            <div class="col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekomendasi Asupan Makanan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body" style="font-size: 1.5rem;">
                                {{ $data['rekomendasi_asupan'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty( $data['tindakan_pendukung'] ))
            <div class="col-md-6 col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tindakan Pendukung</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body" style="font-size: 1.5rem;">
                                {{ $data['tindakan_pendukung'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>
<!-- // Basic multiple Column Form section end -->
        

{{-- <div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Profile Views</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold text-center">User</h6>
                                    <h6 class="font-extrabold mb-0 text-center">{{ $users->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold text-center">Barang</h6>
                                    <h6 class="font-extrabold mb-0 text-center">{{ $mb->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


<script>
    const imtLabels = {!! json_encode($grafik->pluck('created_at')->map(fn($date) => \Carbon\Carbon::parse($date)->format('d M Y'))) !!};
    const imtValues = {!! json_encode($grafik->pluck('imt')->map(fn($v) => round((float)$v, 2))) !!};

    const ctx = document.getElementById('imtChart').getContext('2d');
    const imtChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: imtLabels,
            datasets: [{
                label: 'Perkembangan IMT',
                data: imtValues,
                backgroundColor: 'rgba(67, 94, 190, 0.2)', // area bawah garis
                borderColor: 'rgba(255, 99, 132, 1)', // warna garis utama
                pointBackgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0',
                    '#9966FF', '#FF9F40', '#00c853', '#c51162'
                ], // titik warna-warni
                pointBorderColor: '#fff',
                pointRadius: 5,
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    title: {
                        display: true,
                        text: 'IMT'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal Pemeriksaan'
                    }
                }
            }
        }
    });
</script>


    
@endsection
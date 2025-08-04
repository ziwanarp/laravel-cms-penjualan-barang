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

            <div id="step-container">

                <!-- Step 1: Hasil Analisis IMT -->
                <div class="step">
                    <div class="col-md-12 col-12">
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
                                                    @if ($data['status2'] == 'Gizi Kurang')
                                                        <img src="{{ asset('assets/images/gizi_kurang.jpeg') }}" alt="" class="w-50">
                                                    @elseif ($data['status2'] == 'Gizi Normal')
                                                        <img src="{{ asset('assets/images/gizi_normal.jpeg') }}" alt="" class="w-50">
                                                    @else
                                                        <img src="{{ asset('assets/images/gizi_lebih.jpeg') }}" alt="" class="w-50">
                                                    @endif
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success btn-xl me-1 mb-1">IMT
                                                        {{ $data['imt'] }}</button>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-center">
                                                    <h4 class="card-title">Status IMT: <i><u>{{ $data['status1'] }}</u></i>
                                                    </h4>
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-center">
                                                    <h4 class="card-title">Status Gizi: <i><u>{{ $data['status2'] }}</u></i>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Grafik -->
                <div class="step d-none">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rekomendasi Gizi <b
                                        class="text-danger">{{ $data['nama'] }}</b></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body d-flex justify-content-center">
                                        <img src="{{ asset('assets/images/rekomendasi.jpeg') }}" alt="" class="w-50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Grafik -->
                <div class="step d-none">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grafik Analisis IMT Dengan nama <b
                                        class="text-danger">{{ $data['nama'] }}</b></h4>
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
                </div>

                <!-- Step 3: Penjelasan -->
                @if (!empty($data['penjelasan']))
                    <div class="step d-none">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Penjelasan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body" style="font-size: 1.5rem;">
                                            @php
                                                // Fungsi renderList didefinisikan inline
                                                if (!function_exists('renderList')) {
                                                    function renderList($text)
                                                    {
                                                        if (preg_match('/\d+\.\s/', $text)) {
                                                            $items = preg_split('/(?=\d+\.\s)/', $text);
                                                            echo '<ol style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim(preg_replace('/^\d+\.\s/', '', $item));
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.75rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ol>';
                                                        } else {
                                                            $items = preg_split('/•\s*/', $text);
                                                            echo '<ul style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim($item);
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.5rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ul>';
                                                        }
                                                    }
                                                }

                                                renderList($data['penjelasan']);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Step 4: Tindakan dan Saran -->
                @if (!empty($data['tindakan']))
                    <div class="step d-none">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tindakan dan Saran</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body" style="font-size: 1.5rem;">
                                            @php
                                                // Fungsi renderList didefinisikan inline
                                                if (!function_exists('renderList')) {
                                                    function renderList($text)
                                                    {
                                                        if (preg_match('/\d+\.\s/', $text)) {
                                                            $items = preg_split('/(?=\d+\.\s)/', $text);
                                                            echo '<ol style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim(preg_replace('/^\d+\.\s/', '', $item));
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.75rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ol>';
                                                        } else {
                                                            $items = preg_split('/•\s*/', $text);
                                                            echo '<ul style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim($item);
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.5rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ul>';
                                                        }
                                                    }
                                                }

                                                renderList($data['tindakan']);
                                            @endphp

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Step 5: Data Lainnya -->
                <div class="step d-none">
                    @if (!empty($data['rujukan']))
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rujukan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body" style="font-size: 1.5rem;">
                                             @php
                                                // Fungsi renderList didefinisikan inline
                                                if (!function_exists('renderList')) {
                                                    function renderList($text)
                                                    {
                                                        if (preg_match('/\d+\.\s/', $text)) {
                                                            $items = preg_split('/(?=\d+\.\s)/', $text);
                                                            echo '<ol style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim(preg_replace('/^\d+\.\s/', '', $item));
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.75rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ol>';
                                                        } else {
                                                            $items = preg_split('/•\s*/', $text);
                                                            echo '<ul style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim($item);
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.5rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ul>';
                                                        }
                                                    }
                                                }

                                                renderList($data['rujukan']);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['tanda_umum']))
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tanda - Tanda Umum</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body" style="font-size: 1.5rem;">
                                             @php
                                                // Fungsi renderList didefinisikan inline
                                                if (!function_exists('renderList')) {
                                                    function renderList($text)
                                                    {
                                                        if (preg_match('/\d+\.\s/', $text)) {
                                                            $items = preg_split('/(?=\d+\.\s)/', $text);
                                                            echo '<ol style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim(preg_replace('/^\d+\.\s/', '', $item));
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.75rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ol>';
                                                        } else {
                                                            $items = preg_split('/•\s*/', $text);
                                                            echo '<ul style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim($item);
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.5rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ul>';
                                                        }
                                                    }
                                                }

                                                renderList($data['tanda_umum']);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['rekomendasi_asupan']))
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rekomendasi Asupan Makanan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body" style="font-size: 1.5rem;">
                                             @php
                                                // Fungsi renderList didefinisikan inline
                                                if (!function_exists('renderList')) {
                                                    function renderList($text)
                                                    {
                                                        if (preg_match('/\d+\.\s/', $text)) {
                                                            $items = preg_split('/(?=\d+\.\s)/', $text);
                                                            echo '<ol style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim(preg_replace('/^\d+\.\s/', '', $item));
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.75rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ol>';
                                                        } else {
                                                            $items = preg_split('/•\s*/', $text);
                                                            echo '<ul style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim($item);
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.5rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ul>';
                                                        }
                                                    }
                                                }

                                                renderList($data['rekomendasi_asupan']);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (!empty($data['tindakan_pendukung']))
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tindakan Pendukung</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body" style="font-size: 1.5rem;">
                                             @php
                                                // Fungsi renderList didefinisikan inline
                                                if (!function_exists('renderList')) {
                                                    function renderList($text)
                                                    {
                                                        if (preg_match('/\d+\.\s/', $text)) {
                                                            $items = preg_split('/(?=\d+\.\s)/', $text);
                                                            echo '<ol style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim(preg_replace('/^\d+\.\s/', '', $item));
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.75rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ol>';
                                                        } else {
                                                            $items = preg_split('/•\s*/', $text);
                                                            echo '<ul style="padding-left: 1.5rem;">';
                                                            foreach ($items as $item) {
                                                                $clean = trim($item);
                                                                if (!empty($clean)) {
                                                                    echo "<li style='margin-bottom:0.5rem;'>$clean</li>";
                                                                }
                                                            }
                                                            echo '</ul>';
                                                        }
                                                    }
                                                }

                                                renderList($data['tindakan_pendukung']);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="text-center mt-3">
                <button id="prevBtn" class="btn btn-secondary" disabled>Previous</button>
                <button id="nextBtn" class="btn btn-primary">Next</button>
            </div>

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
        const imtValues = {!! json_encode($grafik->pluck('imt')->map(fn($v) => round((float) $v, 2))) !!};

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

        let currentStep = 0;
        const steps = document.querySelectorAll('.step');

        function showStep(index) {
            steps.forEach((step, i) => {
                step.classList.toggle('d-none', i !== index);
            });

            document.getElementById('prevBtn').disabled = index === 0;

            const nextBtn = document.getElementById('nextBtn');
            if (index === steps.length - 1) {
                nextBtn.classList.add('d-none'); // Sembunyikan tombol Next
            } else {
                nextBtn.classList.remove('d-none');
                nextBtn.textContent = 'Next';
            }
        }

        document.getElementById('nextBtn').addEventListener('click', function() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        showStep(currentStep);
    </script>
@endsection

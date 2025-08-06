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
                    <div class="card shadow p-4 mb-5">
                        <div class="container mt-4">
                            <h4 class="d-flex justify-content-center">No Data</h4>
                            @if (!empty($imt))
                                
                                <!-- TERAKHIR DIINPUT -->
                                <div class="text-center mb-4">
                                    <button class="btn btn-primary px-5 py-3">Nama: {{ $imt->nama }}</button>
                                </div>

                                <!-- 3 Kolom: TINGGI BADAN, BERAT BADAN, LILA -->
                                <div class="d-flex justify-content-center gap-3 mb-4">
                                    <button class="btn btn-primary">TINGGI BADAN: {{ $imt->tb }}</button>
                                    <button class="btn btn-primary">BERAT BADAN: {{ $imt->bb }}</button>
                                    <button class="btn btn-primary">LILA: {{ $imt->lila ?? 0 }}</button>
                                </div>

                                <!-- PEMANTAUAN PERTUMBUHAN -->
                                <div class="text-center mb-3">
                                    <button class="btn btn-primary px-4 py-3">
                                        PEMANTAUAN PERTUMBUHAN<br>
                                        {{ $imt->penjelasan ?? $imt->tanda_umum }}
                                    </button>
                                </div>

                                <!-- Chart Example -->
                            <div class="d-flex p-3 justify-content-center">
                                    <div class="mx-auto" style="width: 600px;">
                                        <canvas id="growthChart"></canvas>
                                    </div>
                                </div>

                            @endif

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- Tambahkan di akhir body -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('growthChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Berat Badan', 'Tinggi Badan', 'LILA'],
                    datasets: [{
                        label: 'Pemantauan Pertumbuhan',
                        data: [
                            {{ $imt->bb ?? 0 }},
                            {{ $imt->tb ?? 0 }},
                            {{ $imt->lila ?? 0 }}
                        ],
                        backgroundColor: 'rgba(67, 94, 190, 0.2)',
                        borderColor: '#435ebe',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Grafik Pertumbuhan'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection

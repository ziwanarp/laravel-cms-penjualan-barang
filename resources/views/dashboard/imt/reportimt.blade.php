@extends('dashboard.layouts.main')

@section('container')

<!-- DataTables Styles & Scripts -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            dom: 'Blfrtip',
            buttons: ['print']
        });
    });
</script>


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-body">
                <table class="table table-striped display nowrap " id="table1" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Berat Badan (kg)</th>
                            <th>IMT</th>
                            <th>Status Gizi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imts as $imt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $imt->nama }}</td>
                                <td>{{ $imt->jk == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                                <td>{{ $imt->usia }}</td>
                                <td>{{ $imt->tb }}</td>
                                <td>{{ $imt->bb }}</td>
                                <td>{{ $imt->imt }}</td>
                                <td>{{ $imt->status2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection

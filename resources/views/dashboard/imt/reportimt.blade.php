@extends('dashboard.layouts.main')
@section('container')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
                {{-- <p class="text-subtitle text-muted">Semua data akun Admin & User</p> --}}
            </div>
            {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master User</li>
                    </ol>
                </nav>
            </div> --}}
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            {{-- <div class="card-header">
                Data Akun 
            </div>
            <div class="mx-4 mb-3">
                <a href="/masteruser/create" class="badge bg-primary fs-6"><span data-feather="user-plus"></span> Tambah user</a>
            </div> --}}
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
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Berat Badan (kg)</th>
                            <th>IMT</th>
                            {{-- <th>Status IMT</th> --}}
                            <th>Status Gizi</th>
                        </tr>
                    </thead>
                    @foreach ($imts as $imt)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $imt->nama }}</td>
                            <td>{{ $imt->jk == "L" ? "Laki - Laki" : "Perempuan" }}</td>
                            <td>{{ $imt->usia }}</td>
                            <td>{{ $imt->tb }}</td>
                            <td>{{ $imt->bb }}</td>
                            <td>{{ $imt->imt }}</td>
                            {{-- <td>{{ $imt->status1 }}</td> --}}
                            <td>{{ $imt->status2 }}</td>
                        </tr>
                    </tbody> 
                    @endforeach
                    
                </table>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>






    
    
@endsection
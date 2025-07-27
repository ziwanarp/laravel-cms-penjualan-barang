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
{{-- <section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Aplikasi Penjualan Barang</h4>
        </div>
        <div class="card-body">
            Aplikasi Penjualan Barang adalah aplikasi yang dibuat oleh <strong><a href="https://instagram.com/ziwanarp" target=_blank>Ziwana Rizwan Pramudia .</a></strong> <br>
            Teknologi yang digunakan dalam aplikasi ini adalah: <br>
            <ol>
                <li>Farmework <a href="https://laravel.com/" target=_blank>Laravel 9.</a></li>
                <li>Ajax jQuery.</li>
                <li>Template Admin <a href="https://github.com/zuramai/mazer" target=_blank>Mazer.</a></li>
                <li>DBMS MySQL.</li>
                <li><a href="https://github.com/barryvdh/laravel-dompdf" target=_blank>Laravel DOMPDF.</a></li>
                <li>Library <a href="https://github.com/itsgoingd/clockwork" target=_blank>ClockWork.</a></li>
            </ol>
            <strong> Fitur Aplikasi ini adalah : </strong><br>
            <ol>
                <li>Crud User (untuk Admin)</li>
                <li>Crud Barang (untuk Admin)</li>
                <li>Penjualan Barang</li>
                <li>Laporan Penjualan Barang</li>
                <li>Cetak Laporan Penjualan Barang (PDF)</li>
                <li>Import/Export data barang (Excell)</li>
            </ol>
        </div>
    </div>
</section> --}}
<div class="page-content">
    {{-- <section class="row">
        <div class="col-12 col-lg-9"> --}}
            <div class="row">
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        {{-- <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 ">
                                    <h6 class="text-muted font-semibold text-center">Jumlah Report IMT</h6>
                                    <h6 class="font-extrabold mb-0 text-center">{{ $imt->count() }}</h6>
                                </div>
                            </div>
                        </div> --}}
                        <img src="{{ asset('assets/images/db1.jpeg') }}" alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        {{-- <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold text-center">Jumlah User</h6>
                                    <h6 class="font-extrabold mb-0 text-center">{{ $users->count() }}</h6>
                                </div>
                            </div>
                        </div> --}}
                        <img src="{{ asset('assets/images/db2.jpeg') }}" alt="">
                        {{-- style="background-image: linear-gradient(rgba(128,128,128,0.5), rgba(128,128,128,0.5)), url('{{ asset('assets/images/bglogin.jpg') }}'); background-size: cover; background-position: center;" --}}
                    </div>
                </div>
                {{-- <div class="col-6 col-lg-3 col-md-6">
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
                                    <h6 class="font-extrabold mb-0 text-center"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
    
@endsection
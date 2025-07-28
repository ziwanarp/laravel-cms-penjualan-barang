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
    <div class="row match-height" >
        <div class="col-md-7 col-12">
            <div class="card " style="background-image: linear-gradient(rgba(128,128,128,0.5), rgba(128,128,128,0.5)), url('{{ asset('assets/images/bglogin.jpeg') }}'); background-size: cover; background-position: center;"
>
                <div class="card-header">
                    <h4 class="card-title">Input Data Antropometri</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="/imt" method="post" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="text-black">Nama</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                             autocomplete="off" value="{{ old('nama') }}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-black">Usia</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="usia" class="form-control @error('usia') is-invalid @enderror" name="usia"
                                             autocomplete="off" value="{{ old('usia') }}">
                                            @error('usia')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-black">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="jk" name="jk" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-black">Tinggi Badan (cm)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="number" id="tb" class="form-control @error('tb') is-invalid @enderror" name="tb"
                                             autocomplete="off" value="{{ old('tb') }}">
                                            @error('tb')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-black">Berat Badan (kg)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" id="bb" class="form-control @error('bb') is-invalid @enderror" name="bb"
                                             autocomplete="off" value="{{ old('bb') }}">
                                            @error('bb')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-black">LILA (cm)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="lila" class="form-control @error('lila') is-invalid @enderror" name="lila"
                                             autocomplete="off" value="{{ old('lila') }}">
                                            @error('lila')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                   
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    
@endsection
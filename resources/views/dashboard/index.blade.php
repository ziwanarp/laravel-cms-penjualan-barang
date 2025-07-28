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

<div class="page-content">

            <div class="row">

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <img src="{{ asset('assets/images/db1.jpeg') }}" alt="">
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <img src="{{ asset('assets/images/db2.jpeg') }}" alt="">
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <img src="{{ asset('assets/images/db3.jpeg') }}" alt="">
                    </div>
                </div>

                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <img src="{{ asset('assets/images/db4.jpeg') }}" alt="">
                    </div>
                </div>

            </div>
    
@endsection

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Dashboard StokSmart</h2>
    <p class="text-muted">Selamat datang di Sistem Analisis Persediaan dan Rekomendasi Pengadaan Barang.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Total Barang</p>
                <h3 class="fw-bold">{{ $totalBarang }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Menipis</p>
                <h3 class="fw-bold text-warning">{{ $stokMenipis }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Habis</p>
                <h3 class="fw-bold text-danger">{{ $stokHabis }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="fw-bold">Tentang StokSmart</h5>
        <p class="mb-0">
            StokSmart membantu mengelola persediaan barang dengan menghitung
            stok akhir, mengidentifikasi barang yang perlu diperhatikan,
            serta memberikan rekomendasi pengadaan barang.
        </p>
    </div>
</div>
@endsection

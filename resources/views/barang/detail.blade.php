
@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
<div class="mb-4">
    <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary btn-sm mb-3">← Kembali</a>
    <h2 class="fw-bold">Detail Barang</h2>
    <p class="text-muted">Informasi lengkap persediaan barang.</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h4 class="fw-bold">{{ $item['nama'] }}</h4>
        <span class="badge bg-primary mb-3">{{ $item['kategori'] }}</span>

        <div class="row g-3">
            <div class="col-md-6">
                <p class="text-muted mb-1">Stok Awal</p>
                <h5>{{ $item['stok_awal'] }} unit</h5>
            </div>
            <div class="col-md-6">
                <p class="text-muted mb-1">Barang Masuk</p>
                <h5>{{ $item['barang_masuk'] }} unit</h5>
            </div>
            <div class="col-md-6">
                <p class="text-muted mb-1">Barang Keluar</p>
                <h5>{{ $item['barang_keluar'] }} unit</h5>
            </div>
            <div class="col-md-6">
                <p class="text-muted mb-1">Stok Akhir</p>
                <h5 class="text-primary">{{ $item['stok_akhir'] }} unit</h5>
            </div>
            <div class="col-md-6">
                <p class="text-muted mb-1">Target Stok</p>
                <h5>{{ $item['target_stok'] }} unit</h5>
            </div>
            <div class="col-md-6">
                <p class="text-muted mb-1">Status Persediaan</p>
                @if ($item['status'] == 'Aman')
                    <span class="badge bg-success fs-6">Aman</span>
                @elseif ($item['status'] == 'Menipis')
                    <span class="badge bg-warning text-dark fs-6">Menipis</span>
                @else
                    <span class="badge bg-danger fs-6">Habis</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

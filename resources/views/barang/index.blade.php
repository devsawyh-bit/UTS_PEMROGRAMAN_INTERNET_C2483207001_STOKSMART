
@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Data Persediaan Barang</h2>
        <p class="text-muted mb-0">Daftar seluruh barang yang tersedia dalam persediaan.</p>
    </div>
    <span class="badge bg-primary fs-6">{{ count($barang) }} Barang</span>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok Awal</th>
                        <th>Barang Masuk</th>
                        <th>Barang Keluar</th>
                        <th>Stok Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $item['nama'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['stok_awal'] }}</td>
                        <td>{{ $item['barang_masuk'] }}</td>
                        <td>{{ $item['barang_keluar'] }}</td>
                        <td>{{ $item['stok_akhir'] }}</td>
                        <td>
                            
@if (!$item['valid'])
    <span class="badge bg-dark">Data Tidak Valid</span>
@elseif ($item['status'] == 'Aman')
    <span class="badge bg-success">Aman</span>
@elseif ($item['status'] == 'Menipis')
    <span class="badge bg-warning text-dark">Menipis</span>
@else
    <span class="badge bg-danger">Habis</span>
@endif

                        </td>
                        <td>
                            <a href="{{ route('barang.detail', $item['id']) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

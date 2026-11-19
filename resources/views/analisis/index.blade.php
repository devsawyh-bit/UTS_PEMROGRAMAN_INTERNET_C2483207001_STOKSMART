
@extends('layouts.app')

@section('title', 'Analisis Persediaan')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Analisis Persediaan</h2>
    <p class="text-muted">Ringkasan kondisi stok dan rekomendasi pengadaan barang.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Aman</p>
                <h3 class="fw-bold text-success">{{ $jumlahAman }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Menipis</p>
                <h3 class="fw-bold text-warning">{{ $jumlahMenipis }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Habis</p>
                <h3 class="fw-bold text-danger">{{ $jumlahHabis }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Rekomendasi Pengadaan Barang</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok Akhir</th>
                        <th>Target Stok</th>
                        <th>Jumlah Pengadaan</th>
                        <th>Prioritas</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekomendasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['stok_akhir'] }}</td>
                        <td>{{ $item['target_stok'] }}</td>
                        <td class="fw-bold">{{ $item['jumlah_pengadaan'] }} unit</td>
                        <td>
                            @if ($item['prioritas'] == 'Tinggi')
                                <span class="badge bg-danger">Tinggi</span>
                            @elseif ($item['prioritas'] == 'Sedang')
                                <span class="badge bg-warning text-dark">Sedang</span>
                            @else
                                <span class="badge bg-success">Rendah</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada barang yang perlu diadakan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

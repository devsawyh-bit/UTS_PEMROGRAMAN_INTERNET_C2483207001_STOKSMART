
@extends('layouts.app')

@section('title', 'Tentang StokSmart')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Tentang StokSmart</h2>
    <p class="text-muted">Sistem Analisis Persediaan dan Rekomendasi Pengadaan Barang.</p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h4 class="fw-bold text-primary">Apa itu StokSmart?</h4>
        <p>
            StokSmart merupakan sistem informasi berbasis web yang membantu
            pengguna dalam memantau persediaan barang, menghitung stok akhir,
            mengidentifikasi kondisi persediaan, dan menentukan rekomendasi
            pengadaan barang.
        </p>

        <h5 class="fw-bold mt-4">Fitur Utama</h5>
        <ul>
            <li>Menampilkan data persediaan barang.</li>
            <li>Menghitung stok akhir secara otomatis.</li>
            <li>Mengidentifikasi data persediaan yang tidak valid.</li>
            <li>Mengelompokkan stok menjadi aman, menipis, dan habis.</li>
            <li>Memberikan rekomendasi jumlah dan prioritas pengadaan.</li>
        </ul>

        <h5 class="fw-bold mt-4">Tujuan Sistem</h5>
        <p class="mb-0">
            Membantu proses pengelolaan persediaan agar lebih teratur,
            meminimalkan risiko kehabisan barang, dan mendukung pengambilan
            keputusan pengadaan berdasarkan kondisi stok.
        </p>
    </div>
</div>
@endsection

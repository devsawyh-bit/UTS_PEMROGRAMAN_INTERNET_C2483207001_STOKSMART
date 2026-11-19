<?php

namespace App\Http\Controllers;

class AnalisisController extends Controller
{
    public function index()
    {
        $barang = BarangController::hasilAnalisis();

        $dataValid = array_filter($barang, function ($item) {
            return $item['valid'];
        });

        $jumlahAman = count(array_filter($dataValid, function ($item) {
            return $item['status'] == 'Aman';
        }));

        $jumlahMenipis = count(array_filter($dataValid, function ($item) {
            return $item['status'] == 'Menipis';
        }));

        $jumlahHabis = count(array_filter($dataValid, function ($item) {
            return $item['status'] == 'Habis';
        }));

        $rekomendasi = array_filter($dataValid, function ($item) {
            return $item['jumlah_pengadaan'] > 0;
        });

        usort($rekomendasi, function ($a, $b) {
            $urutan = ['Tinggi' => 1, 'Sedang' => 2, 'Rendah' => 3];

            return $urutan[$a['prioritas']] <=> $urutan[$b['prioritas']];
        });

        return view('analisis.index', compact(
            'jumlahAman',
            'jumlahMenipis',
            'jumlahHabis',
            'rekomendasi'
        ));
    }
}

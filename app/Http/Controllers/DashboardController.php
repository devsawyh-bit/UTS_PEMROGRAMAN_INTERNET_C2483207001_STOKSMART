<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = BarangController::hasilAnalisis();

        $dataValid = array_filter($barang, function ($item) {
            return $item['valid'];
        });

        $totalBarang = count($barang);

        $stokMenipis = count(array_filter($dataValid, function ($item) {
            return $item['status'] == 'Menipis';
        }));

        $stokHabis = count(array_filter($dataValid, function ($item) {
            return $item['status'] == 'Habis';
        }));

        return view('dashboard', compact(
            'totalBarang',
            'stokMenipis',
            'stokHabis'
        ));
    }
}

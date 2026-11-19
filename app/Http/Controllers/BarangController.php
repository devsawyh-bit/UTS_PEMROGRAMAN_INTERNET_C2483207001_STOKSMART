<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public static function dataBarang()
    {
        return [
            ['id' => 1, 'nama' => 'Laptop', 'kategori' => 'Elektronik', 'stok_awal' => 20, 'barang_masuk' => 5, 'barang_keluar' => 10, 'target_stok' => 25],
            ['id' => 2, 'nama' => 'Mouse', 'kategori' => 'Elektronik', 'stok_awal' => 30, 'barang_masuk' => 10, 'barang_keluar' => 25, 'target_stok' => 30],
            ['id' => 3, 'nama' => 'Keyboard', 'kategori' => 'Elektronik', 'stok_awal' => 15, 'barang_masuk' => 5, 'barang_keluar' => 18, 'target_stok' => 25],
            ['id' => 4, 'nama' => 'Monitor', 'kategori' => 'Elektronik', 'stok_awal' => 10, 'barang_masuk' => 5, 'barang_keluar' => 3, 'target_stok' => 15],
            ['id' => 5, 'nama' => 'Printer', 'kategori' => 'Elektronik', 'stok_awal' => 8, 'barang_masuk' => 2, 'barang_keluar' => 9, 'target_stok' => 15],

            ['id' => 6, 'nama' => 'Buku Tulis', 'kategori' => 'Alat Tulis', 'stok_awal' => 50, 'barang_masuk' => 20, 'barang_keluar' => 30, 'target_stok' => 60],
            ['id' => 7, 'nama' => 'Pulpen', 'kategori' => 'Alat Tulis', 'stok_awal' => 40, 'barang_masuk' => 10, 'barang_keluar' => 35, 'target_stok' => 50],
            ['id' => 8, 'nama' => 'Pensil', 'kategori' => 'Alat Tulis', 'stok_awal' => 25, 'barang_masuk' => 10, 'barang_keluar' => 30, 'target_stok' => 40],
            ['id' => 9, 'nama' => 'Penghapus', 'kategori' => 'Alat Tulis', 'stok_awal' => 20, 'barang_masuk' => 5, 'barang_keluar' => 25, 'target_stok' => 30],
            ['id' => 10, 'nama' => 'Spidol', 'kategori' => 'Alat Tulis', 'stok_awal' => 15, 'barang_masuk' => 5, 'barang_keluar' => 8, 'target_stok' => 20],

            ['id' => 11, 'nama' => 'Kertas A4', 'kategori' => 'Perlengkapan Kantor', 'stok_awal' => 40, 'barang_masuk' => 10, 'barang_keluar' => 20, 'target_stok' => 50],
            ['id' => 12, 'nama' => 'Map Folder', 'kategori' => 'Perlengkapan Kantor', 'stok_awal' => 20, 'barang_masuk' => 5, 'barang_keluar' => 18, 'target_stok' => 30],
            ['id' => 13, 'nama' => 'Stapler', 'kategori' => 'Perlengkapan Kantor', 'stok_awal' => 10, 'barang_masuk' => 5, 'barang_keluar' => 2, 'target_stok' => 15],
            ['id' => 14, 'nama' => 'Lakban', 'kategori' => 'Perlengkapan Kantor', 'stok_awal' => 12, 'barang_masuk' => 3, 'barang_keluar' => 10, 'target_stok' => 20],
            ['id' => 15, 'nama' => 'Gunting', 'kategori' => 'Perlengkapan Kantor', 'stok_awal' => 5, 'barang_masuk' => 0, 'barang_keluar' => 8, 'target_stok' => 10],
        ];
    }

    public static function hasilAnalisis()
    {
        $hasil = [];

        foreach (self::dataBarang() as $item) {
            $valid = $item['stok_awal'] >= 0
                && $item['barang_masuk'] >= 0
                && $item['barang_keluar'] >= 0
                && $item['target_stok'] >= 0
                && $item['barang_keluar'] <= ($item['stok_awal'] + $item['barang_masuk']);

            $item['valid'] = $valid;

            if (!$valid) {
                $item['stok_akhir'] = 0;
                $item['status'] = 'Data Tidak Valid';
                $item['jumlah_pengadaan'] = 0;
                $item['prioritas'] = '-';
            } else {
                $item['stok_akhir'] = $item['stok_awal']
                    + $item['barang_masuk']
                    - $item['barang_keluar'];

                if ($item['stok_akhir'] == 0) {
                    $item['status'] = 'Habis';
                } elseif ($item['stok_akhir'] <= ($item['target_stok'] * 0.5)) {
                    $item['status'] = 'Menipis';
                } else {
                    $item['status'] = 'Aman';
                }

                $item['jumlah_pengadaan'] = max(
                    0,
                    $item['target_stok'] - $item['stok_akhir']
                );

                if ($item['status'] == 'Habis') {
                    $item['prioritas'] = 'Tinggi';
                } elseif ($item['status'] == 'Menipis') {
                    $item['prioritas'] = 'Sedang';
                } else {
                    $item['prioritas'] = 'Rendah';
                }
            }

            $hasil[] = $item;
        }

        return $hasil;
    }

    public function index()
    {
        return view('barang.index', [
            'barang' => self::hasilAnalisis()
        ]);
    }

    public function detail($id)
    {
        $barang = self::hasilAnalisis();

        foreach ($barang as $item) {
            if ($item['id'] == $id) {
                return view('barang.detail', compact('item'));
            }
        }

        abort(404);
    }
}
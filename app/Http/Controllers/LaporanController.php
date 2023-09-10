<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Models\kabupaten;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Provinsi;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        $prov = $request['provinsi'];
        $kab = $request['kabupaten'];
        $nama = $request['nama'];

        // Ambil Data ID Provinsi Berdasarkan Filter Yang Dipilih
        $idprov = Provinsi::where('Nama_P', '=', $prov)->get()->value('id');

        // Seleksi Data Jika Kolom Provinsi, Kabupaten dan Nama Diisi
        if (!empty($request["provinsi"]) && !empty($request["kabupaten"]) && !empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.nama', '=', $nama)
                ->where('penduduk.kabupaten', '=', $kab)
                ->where('penduduk.provinsi', '=', $prov)
                ->paginate(10);
            // Menghitung Jumlah Warga
            $jumlah = $datawarga->count();
            // Ambil Data Provinsi
            $provinsi = Provinsi::get();
            // Ambil data Kabupaten Berdasarkan ID Provinsi
            $kabupaten = kabupaten::where('Provinsi', '=', $idprov)->get();
            return view('contents.laporan', compact('datawarga', 'request', 'jumlah', 'provinsi', 'kabupaten'));
        }
        // Seleksi Data Jika Kolom Provinsi Diisi, dan Kolom Lain Kosong
        elseif (!empty($request["provinsi"]) && empty($request["kabupaten"]) && empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.provinsi', '=', $prov)
                ->paginate(10);
            // Menghitung Jumlah Warga
            $jumlah = $datawarga->count();
            // Ambil Data Provinsi
            $provinsi = Provinsi::get();
            // Ambil data Kabupaten Berdasarkan ID Provinsi
            $kabupaten = kabupaten::where('Provinsi', '=', $idprov)->get();
            return view('contents.laporan', compact('datawarga', 'request', 'jumlah', 'provinsi', 'kabupaten'));
        }
        // Seleksi Data Jika Kolom Kabupaten Diisi, dan Kolom Lain Kosong
        elseif (empty($request["provinsi"]) && !empty($request["kabupaten"]) && empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.kabupaten', '=', $kab)
                ->paginate(10);
            // Menghitung Jumlah Warga
            $jumlah = $datawarga->count();
            // Ambil Data Provinsi
            $provinsi = Provinsi::get();
            // Ambil data Kabupaten Berdasarkan ID Provinsi
            $kabupaten = kabupaten::where('Provinsi', '=', $idprov)->get();
            return view('contents.laporan', compact('datawarga', 'request', 'jumlah', 'provinsi', 'kabupaten'));
        }
        // Seleksi Data Jika Kolom Nama Diisi, dan Kolom Lain Kosong 
        elseif (empty($request["provinsi"]) && empty($request["kabupaten"]) && !empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.nama', '=', $nama)
                ->paginate(10);
            // Menghitung Jumlah Warga
            $jumlah = $datawarga->count();
            // Ambil Data Provinsi
            $provinsi = Provinsi::get();
            // Ambil data Kabupaten Berdasarkan ID Provinsi
            $kabupaten = kabupaten::where('Provinsi', '=', $idprov)->get();
            return view('contents.laporan', compact('datawarga', 'request', 'jumlah', 'provinsi', 'kabupaten'));
        }
        // Tanpa Seleksi Data
        else {
            $datawarga = Penduduk::paginate(10);
            // Menghitung Jumlah Warga
            $jumlah = $datawarga->count();
            // Ambil Data Provinsi
            $provinsi = Provinsi::get();
            // Ambil data Kabupaten Berdasarkan ID Provinsi
            $kabupaten = kabupaten::get();
            return view('contents.laporan', compact('datawarga', 'request', 'jumlah', 'provinsi', 'kabupaten'));
        }
    }

    // Export Laporan Ke Excel
    public function cetak_excel(Request $request)
    {
        $prov = $request['prvs'];
        $kab = $request['kbptn'];
        $data = Penduduk::where('Provinsi', '=', $prov)
            ->orWhere('Kabupaten', '=', $kab)
            ->get([
                'id',
                'Nama',
                'NIK',
                'Jenis_Kelamin',
                'tgl_lahir',
                'Alamat',
                'Kabupaten',
                'Provinsi',
                'created_at'
            ])->toArray();
        return Excel::download(new ExportExcel($data), 'Laporan-Data-Penduduk.xls');
    }
}

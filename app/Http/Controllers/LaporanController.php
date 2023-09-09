<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Models\kabupaten;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\provinsi;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        $prov = $request['provinsi'];
        $kab = $request['kabupaten'];
        $nama = $request['nama'];
        // Seleksi Data Jika Kolom Provinsi, Kabupaten dan Nama Diisi
        if (!empty($request["provinsi"]) && !empty($request["kabupaten"]) && !empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.nama', '=', $nama)
                ->where('penduduk.kabupaten', '=', $kab)
                ->where('penduduk.provinsi', '=', $prov)
                ->paginate(5);

            return view('contents.laporan', compact('datawarga', 'request'));
        }
        // Seleksi Data Jika Kolom Provinsi Diisi, dan Kolom Lain Kosong
        elseif (!empty($request["provinsi"]) && empty($request["kabupaten"]) && empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.provinsi', '=', $prov)
                ->paginate(5);

            return view('contents.laporan', compact('datawarga', 'request'));
        }
        // Seleksi Data Jika Kolom Kabupaten Diisi, dan Kolom Lain Kosong
        elseif (empty($request["provinsi"]) && !empty($request["kabupaten"]) && empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.kabupaten', '=', $kab)
                ->paginate(5);

            return view('contents.laporan', compact('datawarga', 'request'));
        }
        // Seleksi Data Jika Kolom Nama Diisi, dan Kolom Lain Kosong 
        elseif (empty($request["provinsi"]) && empty($request["kabupaten"]) && !empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.nama', '=', $nama)
                ->paginate(5);

            return view('contents.laporan', compact('datawarga', 'request'));
        }
        // Tanpa Seleksi Data
        else {
            $datawarga = Penduduk::paginate(5);

            return view('contents.laporan', compact('datawarga', 'request'));
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

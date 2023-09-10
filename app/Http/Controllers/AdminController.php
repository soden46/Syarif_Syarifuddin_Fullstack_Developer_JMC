<?php

namespace App\Http\Controllers;

use App\Models\kabupaten;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\provinsi;

class AdminController extends Controller
{
    // Controller Tabel Data Penduduk
    public function data_penduduk(Request $request)
    {
        $prov = $request['provinsi'];
        $kab = $request['kabupaten'];
        $nama = $request['nama'];
        // Seleksi Data Jika Kolom Provinsi, Kabupaten dan Nama Diisi
        if (!empty($request["provinsi"]) && !empty($request["kabupaten"]) && !empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.nama', '=', $nama)
                ->where('penduduk.kabupaten', '=', $kab)
                ->where('penduduk.provinsi', '=', $prov)
                ->paginate(10);

            return view('contents.index', compact('datawarga', 'request'));
        }
        // Seleksi Data Jika Kolom Provinsi Diisi, dan Kolom Lain Kosong
        elseif (!empty($request["provinsi"]) && empty($request["kabupaten"]) && empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.provinsi', '=', $prov)
                ->paginate(10);

            return view('contents.index', compact('datawarga', 'request'));
        }
        // Seleksi Data Jika Kolom Kabupaten Diisi, dan Kolom Lain Kosong
        elseif (empty($request["provinsi"]) && !empty($request["kabupaten"]) && empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.kabupaten', '=', $kab)
                ->paginate(10);

            return view('contents.index', compact('datawarga', 'request'));
        }
        // Seleksi Data Jika Kolom Nama Diisi, dan Kolom Lain Kosong 
        elseif (empty($request["provinsi"]) && empty($request["kabupaten"]) && !empty($request["nama"])) {
            $datawarga = Penduduk::where('penduduk.nama', '=', $nama)
                ->paginate(10);

            return view('contents.index', compact('datawarga', 'request'));
        }
        // Tanpa Seleksi Data
        else {
            $datawarga = Penduduk::paginate(10);

            return view('contents.index', compact('datawarga', 'request'));
        }
    }

    // Controller View Tambah Data
    public function create()
    {

        $provinsi = provinsi::get();
        $kabupaten = kabupaten::get();

        return view(
            'contents.create',
            compact('provinsi', 'kabupaten')
        );
    }

    // Controller Tambah Data Ke Database
    public function store(Request $request)
    {
        // Validasi Data
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|max:18',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required'
        ]);
        // Ambil Nama Provinsi Dari Tabel Provinsi
        $prov = provinsi::where('id', '=', $request->provinsi)->get()->value('Nama_Provinsi');
        // Ambil Nama Kabupaten Dari Tabel Kabupaten
        $kab = kabupaten::where('id', '=', $request->provinsi)->get()->value('Nama_Kabupaten');
        // Simpan Data Ke Database
        Penduduk::create([
            'Nama' => $request->nama,
            'NIK' => $request->nik,
            'Jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'Alamat' => $request->alamat,
            'Provinsi' => $prov,
            'Kabupaten' => $kab
        ]);

        return redirect('/')->with('success', 'Data Penduduk Berhasil Ditambahkan');
    }

    // Controller Tabel Data Penduduk
    public function edit($id)
    {

        $datawarga = Penduduk::where('id', '=', $id)->first();
        $provinsi = provinsi::get();
        $kabupaten = kabupaten::get();
        return view(
            'contents.edit',
            compact('datawarga', 'provinsi', 'kabupaten')
        );
    }

    // Controller Update Data Ke Database
    public function update(Request $request, $id)
    {
        // Validasi Data
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|max:18',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required'
        ]);
        // Ambil Nama Provinsi Dari Tabel Provinsi
        $prov = provinsi::where('id', '=', $request->provinsi)->get()->value('Nama_Provinsi');
        // Ambil Nama Kabupaten Dari Tabel Kabupaten
        $kab = kabupaten::where('id', '=', $request->provinsi)->get()->value('Nama_Kabupaten');
        // Simpan Data Ke Database
        Penduduk::where('id', '=', $id)->update([
            'Nama' => $request->nama,
            'NIK' => $request->nik,
            'Jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'Alamat' => $request->alamat,
            'Provinsi' => $prov,
            'Kabupaten' => $kab
        ]);

        return redirect('/')->with('success', 'Data Penduduk Berhasil Diubah');
    }

    // Controller Hapus Data
    public function destroy($id)
    {
        $data = Penduduk::findOrFail($id)->first();
        $data->delete();
        return redirect('/')->with('success', 'Data Berhasil Dihapus');
    }
}

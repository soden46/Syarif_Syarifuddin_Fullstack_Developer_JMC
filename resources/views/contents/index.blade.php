@extends('layouts.app')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="row">
            <form action="/cari" method="GET">
                <div class="form-inline col-10 d-flex mb-3">
                    <div class="col-6 ms-4 float-right">
                        <a class="btn btn-md btn-success" href="/create">Tambah Data</a>
                    </div>
                    <div class="col-5 d-flex mx-auto float-left">
                        <select class="form-control" id="provinsi" name="provinsi">
                            <option value="">Pilih Provinsi</option>
                            @foreach($datawarga as $data)
                            <option value="{{$data->Provinsi}}" {{request()->input('provinsi')==$data->Provinsi ? 'selected' : '' }}>{{$data->Provinsi}}</option>
                            @endforeach
                        </select>
                        <select class="form-control ms-2" id="kabupaten" name="kabupaten" class="form-control col-2 px-3">
                            <option value="">Pilih Kabupaten</option>
                            @foreach($datawarga as $data)
                            <option value="{{$data->Kabupaten}}" {{request()->input('kabupaten')==$data->Kabupaten ? 'selected' : '' }}>{{$data->Kabupaten}}</option>
                            @endforeach
                        </select>
                        <input class="form-control ms-2" type="text" id="nama" name="nama" placeholder="Pencarian Nama">
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" name="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datawarga as $data)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>
                            <form method="POST" action="{{ route('delete',$data->id) }}">
                                @csrf
                                <a href="{{route('edit',$data->id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-pencil">Edit</span></a>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash">Hapus</span></button>
                            </form>
                        </td>
                        <td>{{$data->Nama}}</td>
                        <td>{{$data->NIK}}</td>
                        <td>{{$data->tgl_lahir}}</td>
                        <td>{{$data->Alamat.", ".$data->Kabupaten.", ".$data->Provinsi}}</td>
                        <td>{{$data->Jenis_kelamin}}</td>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Filter Data Tabel Berdasarkan Provinsi atau Kabupaten -->
    <script>
        $(document).ready(function() {

            var prov = $("#provinsi");
            var kab = $("#kabupaten");
            var nama = $("#nama");

            // Filter Tabel Berdasarkan Provinsi
            if (prov !== "") {
                $("#provinsi").change(function() {
                    var the_selected_prov = $(this).val();
                    window.location = "/cari?provinsi=" + the_selected_prov;
                });
            }
            if (kab !== "") {
                // Filter Tabel Berdasarkan Kabupaten
                $("#kabupaten").change(function() {
                    var the_selected_kab = $(this).val();
                    window.location = "/cari?kabupaten=" + the_selected_kab;
                });
            }

        });
    </script>
    @endsection
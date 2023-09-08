@extends('template.layout')



@section('content')


<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title">Laporan Kegiatan dan Absen</h3>
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-sm float-right"> Buat Laporan </button>
                        </div>
                    </div>
                </div>


                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Mahasiswa</th>
                                <th>Shift</th>
                                <th>Kegiatan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporan as $l)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $l->tanggal }}</td>
                                <td>{{ $l->id_mahasiswa }}</td>
                                <td>{{ $l->id_shift }}</td>
                                <td>{{ $l->kegiatan }}</td>
                                <td>{{ $l->status }}</td>
                                <td>{{ $l->keterangan }}</td>
                                <td>
                                    <button class="btn btn-outline-warning btn-sm"> Edit </button>

                                    <a href="#" class="btn btn-outline-danger btn-sm"> Hapus </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>




                </div>

            </div>
            





            {{-- akhir col-md-12 --}}
        </div>
    </div>



</div>

</section>

@endsection
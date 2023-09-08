@extends('dashboard.admin')


@section('content')


<section class="popular-courses-area section-gap courses-page">
  <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                  <h1 class="mb-10">Jadwal Piket</h1>
                  <p>There is a moment in the life of any aspiring.</p>
              </div>
          </div>
      </div>						

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                {{-- <h3 class="card-title">Data Shift</h3> --}}
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">
                                    Tambah Shift
                                  </button>
                            </div>
                        </div>

                    </div>



                <div class="card-body">

                  <table id="example1"  class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Shift</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($shift as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $s->nm_shift }}</td>
                                <td> {{ $s->jam_masuk }}</td>
                                <td> {{ $s->jam_keluar }}</td>
                                <td> 
                                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{ $s->id }}">
                                        Edit
                                      </button>

                                 <a href="/shift/hapus/{{ $s->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Data Mau Dihapus ? ')"> Hapus </a>     

                                

                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                </div>
            </div>
        </div>
    </div>



</section>

@foreach($shift as $s)
<div class="modal fade" id="modal-edit{{$s->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Jadwal Piket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="/shift/update/{{$s->id}}" method="post"> 
                    @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Shift</label>
                    <input type="text" name="nm_shift" class="form-control" id="exampleInputEmail1" value="{{ $s->nm_shift }}">
                  </div>

               

                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Masuk</label>
                    <input type="time" name="jam_masuk" class="form-control" id="exampleInputEmail1" value="{{$s->jam_masuk}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Keluar</label>
                    <input type="time" name="jam_keluar" class="form-control" id="exampleInputEmail1" value="{{$s->jam_keluar}}">
                  </div>
      



            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="sumbit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endforeach

{{-- Modal Tambah --}}
      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Jadwal Piket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="/shift/store" method="post"> 
                    @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Shift</label>
                    <input type="text" name="nm_shift" class="form-control" id="exampleInputEmail1" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Masuk</label>
                    <input type="time" name="jam_masuk" class="form-control" id="exampleInputEmail1" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Keluar</label>
                    <input type="time" name="jam_keluar" class="form-control" id="exampleInputEmail1" >
                  </div>
      



            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
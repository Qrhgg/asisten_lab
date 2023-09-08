@extends('template.layout')



@section('content')


<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

    <div class="card">
        <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                <h3 class="card-title">Data Jurusan</h3>
              </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">
                Tambah Jurusan
              </button>
            </div>
            </div>
      
          </div>
        
<div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jurusan as $js)

        <tr>
       <td> {{$loop->iteration }}</td>
       <td> {{ $js->kode_jurusan }}</td>
       <td> {{ $js->nama_jurusan }}</td>
       <td> 
        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{ $js->id }}"> Edit </button>
        <a href="/jurusan/hapus/{{ $js->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Data Mau di Hapus ?')"> Hapus </a>
        

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

{{-- Mdoal Edit --}}
@foreach($jurusan as $js)
<div class="modal fade" id="modal-edit{{ $js->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Ubah Jurusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/jurusan/update/{{ $js->id }}">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Jurusan</label>
            <input type="text" name="kode_jurusan" class="form-control" id="exampleInputEmail1" value="{{ $js->kode_jurusan }}" >
          </div>

       
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" id="exampleInputEmail1" value="{{ $js->nama_jurusan }}" >
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
<!-- /.modal -->
@endforeach

{{-- Modal tambah --}}
<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Jurusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="/jurusan/store">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Jurusan</label>
            <input type="text" name="kode_jurusan" class="form-control" id="exampleInputEmail1" >
          </div>

       
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" id="exampleInputEmail1">
          </div>
        


      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



@endsection




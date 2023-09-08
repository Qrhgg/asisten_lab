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
                            <h3 class="card-title">Data Lab Komputer</h3>
                        </div>

                        <div class="col-md-6">

                            <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">
                                Tambah Lab Komputer
                              </button>


                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Lab</th>
                            <th>Jumlah Komputer</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($lab as $l)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $l->Nm_lab }}</td>
                            <td> {{ $l->Jmlh_komputer }}</td>
                            <td> 
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{ $l->id }}">
                                    Edit
                                </button>
                                <a href="/lab-komputer/hapus/{{ $l->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus ?')"> Hapus </a> 
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


<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Lab Komputer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="/lab-komputer/store" method="post">
                @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lab Komputer</label>
                <input type="text" name="Nm_lab" class="form-control" id="exampleInputEmail1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Komputer</label>
                <input type="text" name="Jmlh_komputer" class="form-control" id="exampleInputEmail1">
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

@foreach($lab as $l)
  <div class="modal fade" id="modal-edit{{ $l->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Lab Komputer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <form action="/lab-komputer/update/{{ $l->id }}" method="post">
                    @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lab Komputer</label>
                <input type="text" name="Nm_lab" class="form-control" id="exampleInputEmail1" value="{{ $l->Nm_lab }}">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Komputer</label>
                <input type="text" name="Jmlh_komputer" class="form-control" id="exampleInputEmail1" value="{{ $l->Jmlh_komputer }}">
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

  @endforeach

@endsection
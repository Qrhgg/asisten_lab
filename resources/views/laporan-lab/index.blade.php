@extends('dashboard.admin')


@section('content')

<section class="popular-courses-area section-gap courses-page">
  <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                  <h1 class="mb-10">Laporan Lab</h1>
                  <p>There is a moment in the life of any aspiring.</p>
              </div>
          </div>
      </div>						

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title"></h3>
                            </div>
                            <div class="col-md-6">

                                    <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">
                                        Buat Laporan
                                      </button>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <table id="example1"  class="table table-striped">

                            <thead>
                                <tr>
                                    <th style="width: 10px"> No</th>
                                    <th style="width: 60px"> Tanggal</th>
                                    <th style="width:100px"> Nama Lab</th>
                                    <th> Catatan </th>
                                    <th> Keterangan </th>
                                    <th style="width:90px"> Aksi </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($laporan_lab as $l)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{ $l->tanggal }}</td>
                                    <td>{{ $l->id_labkomputer }}</td>
                                    <td> {{ $l->catatan }}</td>
                                    <td> {{ $l->keterangan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{ $l->id }}">
                                            Edit
                                          </button>
                                        <a href="/laporan-lab/hapus/{{ $l->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Data Mau Di Hapus ?')"> Hapus </a>
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
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>


<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Buat Laporan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            
            <form action="/laporan-lab/store" method="post">
                @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1">
              </div>


              <div class="form-group">
                <label>Nama Lab</label>
                <select class="form-control" name="id_labkomputer">
                  @foreach($lab as $l)
                  <option value="{{ $l->id }}">{{ $l->Nm_lab }}</option>

                  @endforeach
                </select>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Catatan</label>
                <textarea  name="catatan" class="form-control" rows="3" placeholder="Tambahkan Catatan ..."></textarea>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text-" name="keterangan" class="form-control" id="exampleInputEmail1">
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

@foreach($laporan_lab as $l)
  <div class="modal fade" id="modal-edit{{ $l->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="/laporan-lab/update/{{ $l->id }}" method="post">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" value="{{ $l->tanggal }}">
              </div>


              <div class="form-group">
                <label>Nama Lab</label>
                <select class="form-control" name="id_labkomputer">
                  @foreach($lab as $L)
                  <option value="{{ $L->id }}"{{ $l->id_labkomputer  == $L->id ? 'selected' : '' }}> {{ $L->Nm_lab }}</option>


                  @endforeach
                </select>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Catatan</label>
                <textarea  name="catatan" class="form-control" rows="3" placeholder="Tambahkan Catatan ...">{{ $l->catatan }}</textarea>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text-" name="keterangan" class="form-control" id="exampleInputEmail1" value="{{ $l->keterangan }}">
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
  <!-- /.modal -->

@endsection
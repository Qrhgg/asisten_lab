@extends('dashboard.admin')

@section('content')

<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Laporan Kegiatan Mahasiswa</h1>
                    <p>There is a moment in the life of any aspiring.</p>
                </div>
            </div>
        </div>						
        
        <div class="row">
          <div class="col-md-6">

            {{-- <button type="button" class="btn btn-outline-primary btn-sm float-left" data-toggle="modal" data-target="#modal-tambah">
             Buat Laporan
            </button> --}}
            </div>

        </div>
        
       <br>
          
       <div class="card">
        <div class="card-header p-2">
          <div class="col-md-12">

            <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#modal-tambah">
                Buat Laporan
              </button>

              {{-- <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#staticBackdrop">
                Buat Laporan
              </button>               --}}


    </div>

    
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
            <div class="container">
            <div class="row">
            
                <div class="col-md-12">
                  <table id="example1"  class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Tanggal </th>
                        <th>Nama </th>
                        <th>Kegiatan </th>
                        <th>Ruangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        {{-- <th>Aksi</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                         @foreach($laporan as $l)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $l->tanggal}}</td>
                            <td> {{ $l->user->name }}</td>
                            <td> {{ $l->kegiatan }}</td>
                            <td> {{ $l->ruangan->nama_ruangan}}</td>
                            <td> {{ $l->status }}</td>
                            
                            <td> 
                              
                              <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{ $l->id }}">
                                Edit
                              </button>

                             
                                <a href="/laporan/hapus/{{ $l->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus ?')">Hapus </a>
                              
                              </td>                            
                            </td>
                            {{-- <td> 
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit">
                                    Edit
                                  </button>

                             <a href="/shift/hapus/" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Data Mau Dihapus ? ')"> Hapus </a>     

                            

                            </td> --}}


                        </tr>
                        @endforeach
                    </tbody>
                </table>



                </div>
            </div>


            </div>



            </div>
</section>
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

        <form method="post" action="/buatlaporan">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1">
            @if($errors->has('tanggal'))
            <span class="help-block"  style="color:red;">{{$errors->first('tanggal')}} </span>

        @endif
          </div>

          

       
          <div class="form-group">
            <label for="exampleInputEmail1">Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" id="exampleInputEmail1" >
          </div>

          <div class="form-group">
            <label>Ruangan</label>
            <select class="form-control" name="ruangan">
             
              @foreach($ruangan as $r) 
              <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>

              @endforeach


             
            </select>
          </div>


          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
             
              <option value="Selesai"> Selesai </option>
              <option value="Belum Selesai"> Belum Selesai </option>
             


             
            </select>
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1">
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


{{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> --}}

{{-- Modal Edit --}}
@foreach($laporan as $l)
<div class="modal fade" id="modal-edit{{$l->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Jadwal Piket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="/laporan/update/{{$l->id}}" method="post"> 
                    @csrf

               <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" value="{{ $l->tanggal }}">
          </div>

          

       
          <div class="form-group">
            <label for="exampleInputEmail1">Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" id="exampleInputEmail1" value="{{ $l->kegiatan }}" >
          </div>

          <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control" name="id_jurusan">
             @foreach($ruangan as $r) 
              <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>

              @endforeach
            </select>
          </div>

             
            </select>
          </div>


          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
             
              <option value="Selesai"> Selesai </option>
              <option value="Belum Selesai"> Belum Selesai </option>
             


             
            </select>
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1">
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
@endsection
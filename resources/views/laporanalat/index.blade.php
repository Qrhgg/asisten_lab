@extends('dashboard.admin')

@php
    use Carbon\Carbon;
@endphp

@section('content')

<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"> Mahasiswa</h1>
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
                            <th style="width:100px"> Peralatan</th>
                            <th style="width:100px"> Ruangan</th>
                            <th style="width:100px"> Nama dosen</th>
                            <th style="width:100px"> Mahasiswa Pemberi</th>
                            <th style="width:100px"> Jam Mulai</th>
                            <th style="width:100px"> Jam Habis</th>
                            <th style="width:100px"> Mahasiswa Pengambil</th>
                            <th style="width:100px"> Status</th>
                            {{-- <th style="width:100px"> Jam diambil</th> --}}

                          
                            <th style="width:90px"> Aksi </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($laporan_alat as $l)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $l->tanggal }} </td>
                            <td> {{ $l->peralatan }}</td>
                            <td> {{ $l->ruangan }}</td>
                            <td> {{ $l->nama_dosen }}</td>
                            <td> {{ $l->mahasiswaPemberi->nm_mahasiswa}}</td>
                            <td> {{$l->jam_mulai->format('H:i')}}</td>
                            <td> {{ $l->jam_habis->format('H:i')}}</td>
                             <td>{{ $l->mahasiswaPengambil ? $l->mahasiswaPengambil->nm_mahasiswa : '-' }}</td>
                            <td> 
                            
                              
                              {{-- @if ($l->status == 'selesai')
                              <span style="color: green;">{{ $l->status }}</span>
                              @else
                              <span style="color: red;">{{ $l->status }}</span>
                              @endif --}}

                             
                              @if ($l->status == 'selesai')
                              <span class="badge badge-success">Selesai</span>
                          @elseif($l->jam_habis <= \Carbon\Carbon::now())
                              <span class="badge badge-warning">Siap Diambil</span>

                              @else
                              <span class="badge badge-danger">Belum Selesai</span>
                          @endif
                            
                            </td>

                             {{-- @if($l->jam_diambil == null) 
                            <td> {{ $l->jam_diambil}}</td>

                          
                            <td>
                              @else()

                              <td> {{ $l->jam_diambil->format('H:i')}}</td>

                          
                              

                                {{-- @endif --}}
                                <td>
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modal-edit{{ $l->id }}">
                                    Edit
                                  </button>
                                 
                                  @if(auth()->user()->role == 'admin')

                            
                                  <a href="/laporanalat-hapus/{{ $l->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Data Mau Di Hapus ?')"> Hapus </a>
                                  @endif

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
              <h4 class="modal-title">Buat Laporan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
    
    
                
                <form action="/laporanalat-store" method="post">
                    @csrf
    
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1">
                  </div>
    
                  <div class="form-group">
                    <label for="exampleInputEmail1">Peralatan</label>
                    <input type="text" name="peralatan" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ruangan</label>
                    <input type="text" name="ruangan" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" id="exampleInputEmail1">
                  </div>

                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1"> Nama Mahasiswa Pemberi</label>
                    <input type="text" name="mahasiswa_pemberi" class="form-control" id="exampleInputEmail1">
                  </div> --}}

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jam Habis</label>
                    <input type="time" name="jam_habis" class="form-control" id="exampleInputEmail1">
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


      {{-- //modal edit  --}}

   @foreach($laporan_alat as $l)
  <div class="modal fade" id="modal-edit{{ $l->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Laporan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            
            <form action="/laporanalat-update/{{$l->id  }}" method="post">
                @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" value="{{ $l->tanggal }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Peralatan</label>
                <input type="text" name="peralatan" class="form-control" id="exampleInputEmail1" value="{{ $l->peralatan }}"  readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Ruangan</label>
                <input type="text" name="ruangan" class="form-control" id="exampleInputEmail1" value="{{ $l->ruangan }}" readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nama Dosen</label>
                <input type="text" name="nama_dosen" class="form-control" id="exampleInputEmail1" value="{{ $l->nama_dosen }}" readonly >
              </div>

              {{-- <div class="form-group">
                <label for="exampleInputEmail1"> Nama Mahasiswa Pemberi</label>
                <input type="text" name="mahasiswa_pemberi" class="form-control" id="exampleInputEmail1">
              </div> --}}

              <div class="form-group">
                <label for="exampleInputEmail1">Jam Mulai</label>
                <input type="text" name="jam_mulai" class="form-control" id="exampleInputEmail1" value="{{ $l->jam_mulai->format('H:i') }}"  readonly>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Jam Habis</label>
                <input type="text" name="jam_habis" class="form-control" id="exampleInputEmail1" value="{{ $l->jam_habis->format('H:i') }}" readonly >
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" name="status">
                   <option value="selesai">Selesai</option>
                   <option value="belum_selesai">Belum selesai</option>
 
                 </select>    
                
                
              
              
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
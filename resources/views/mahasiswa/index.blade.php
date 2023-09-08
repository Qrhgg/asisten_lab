@extends('dashboard.admin')


@section('content')

<section class="popular-courses-area section-gap courses-page">
  <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                  <h1 class="mb-10">Mahasiswa</h1>
                  <p>There is a moment in the life of any aspiring.</p>
              </div>
          </div>
      </div>						



      <section class="connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title">
             
            </h3> --}}
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Daftar Mahasiswa</a>

                 
                </li>
               
                <li class="nav-item">
                  <a class="nav-link" href="#sales-chart" data-toggle="tab">Mahasiswa Baru </a>
                

                </li>
                
                
               

              </ul>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart">
                 
                  {{-- <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas> --}}
                  <div class="card">


                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-6">
                          {{-- <h3 class="card-title">Data Mahasiswa</h3> --}}
                        </div>
                      <div class="col-md-6">
                       
                        {{-- <button type="button" class="btn  btn-outline-primary btn-sm float-right"  data-toggle="modal" data-target="#modal-lg">Tambah Data Mahasiswa</button> --}}
                      </div>
                      </div>
                
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered">
                       
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Mahasiswa</th>
                          <th>Nim</th>
                          <th>Jurusan</th>
                          <th>Shift</th>
                          <th>Piket sejak</th>
                          <th>Berakhir</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($data_siswa as $mhs)
                          

                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td><a href="/mahasiswa/profile/{{ $mhs->id }}">{{ $mhs->nm_mahasiswa }} </a></td>
                          <td>{{ $mhs->nim }}</td>
                          <td>{{ $mhs->jurusan->nama_jurusan}}</td>
                          <td>{{ $mhs->shift->nm_shift }}</td>
                          <td>{{ $mhs->dibuat_sejak->format('d-F-Y') }}</td>
                          <td>{{ $mhs->berakhir->format('d-F-Y')}}</td>
                          <td> <a href="/mahasiswa/edit/{{ $mhs->id }}" class="btn btn-outline-warning btn-sm" > Edit </a>
                            <a href="/mahasiswa/hapus/{{ $mhs->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus ?')">Hapus </a>
                          
                          </td>
                         
                        </tr>
                       
                        @endforeach
                     
                        </tfoot>
                      </table>
                    </div>
                
                
                
                
                
                
                  </div>






                  {{-- batas div mahasiswa aktif --}}
               </div>

              <div class="chart tab-pane" id="sales-chart">
                {{-- <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas> --}}
             <div class="card">


                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-6">
                          {{-- <h3 class="card-title">Data Mahasiswa</h3> --}}
                        </div>
                      <div class="col-md-6">
                       
                        {{-- <button type="button" class="btn  btn-outline-primary btn-sm float-right"  data-toggle="modal" data-target="#modal-lg">Tambah Data Mahasiswa</button> --}}
                      </div>
                      </div>
                
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered">
                       
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Mahasiswa</th>
                          <th>Email</th>
                          {{-- <th>Jurusan</th>
                          <th>Shift</th> --}}
                          {{-- <th>Piket sejak</th>
                          <th>Berakhir</th> --}}
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($aktifasi as $a)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $a->name }} </></td>
                          <td>{{ $a->email }}</td>
                          {{-- <td>{{ $a->siswa->jurusan->nama_jurusan}}</td>
                          <td>{{ $a->siswa->shift->nm_shift }}</td> --}}
                          {{-- <td>{{ $a->siswa->dibuat_sejak->format('d-F-Y') }}</td>
                          <td>{{ $a->siswa->berakhir->format('d-F-Y')}}</td> --}}
                          <td> 
                            
                            <form method="POST" action="aktifasi/update/{{ $a->id}}">
                              @csrf
                          
                              <div class="form-group">
                                  <label for="status"></label>
                                  <select name="status" id="status" class="form-control">
                                      <option value="aktif" {{ $a->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                      <option value="tidak aktif" {{ $a->status === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                  </select>
                              </div>
                          
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                            
                            {{-- <a href="/mahasiswa/edit/{{ $a->id }}" class="btn btn-outline-warning btn-sm" > Edit </a>
                            <a href="/mahasiswa/hapus/{{ $a->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus ?')">Hapus </a> --}}
                          
                          </td>
                          <td>
                            <a href="/mahasiswa/hapus-akun/{{ $a->id }}" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Mau Di Hapus ?')">Hapus </a> 

                          </td>
                         
                        </tr>
                       
                        @endforeach
                     
                        </tfoot>
                      </table>
                    </div>
                
                
                
                
                
                
                  </div>






                  {{-- batas div mahasiswa tidak  aktif --}}
               </div>

              </div>
            </div>
          </div><!-- /.card-body -->
        </div>





</div>
      {{-- </div>
    </div> --}}


</section>

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Tambah Data Mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
        <form action="/mahasiswa/store" method="post">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nim Mahasiwa</label>
              <input type="text" name="nim" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Nama Mahasiswa</label>
              <input type="text" name="nm_mahasiswa" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" >
            </div>


            <div class="form-group">
              <label for="exampleInputEmail1">Alamat</label>
              <textarea  name="alamat" class="form-control" rows="3" placeholder="Tambah Alamat ..."></textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">No Hp</label>
              <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" >
            </div>

              <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control" name="id_jurusan">
                 @foreach($jurusan as $jr) 
                  <option value="{{ $jr->id }}">{{ $jr->nama_jurusan }}</option>

                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Shift</label>
                <select class="form-control" name="id_shift">
                  @foreach($shift as $s)
                  <option value="{{ $s->id }}">{{ $s->nm_shift }}</option>
                  
                  @endforeach
                </select>
              </div>

            <div class="form-group">
              <label for="exampleInputPassword1">dibuat sejak</label>
              <input type="date" name="dibuat_sejak" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">berakhir</label>
              <input type="date" name="berakhir" class="form-control" id="exampleInputPassword1">
            </div>



            
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



<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
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


    @endsection
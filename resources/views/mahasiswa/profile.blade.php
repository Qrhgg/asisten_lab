@extends('dashboard.admin')


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
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ $mahasiswa->getAvatar()}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ $mahasiswa->nm_mahasiswa }}</h3>

              <p class="text-center">{{ $mahasiswa->jurusan->nama_jurusan }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Nim </b> <a class="float-right">{{ $mahasiswa->nim }}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="float-right">{{ $mahasiswa->alamat }}</a>
                </li>
                <li class="list-group-item">
                  <b>No Handphone</b> <a class="float-right"> +62 {{ $mahasiswa->no_hp }}</a>
                </li>
                <li class="list-group-item">
                  <b>Shift</b> <a class="float-right">{{ $mahasiswa->shift->nm_shift }}</a>
                </li>
                <li class="list-group-item">
                  <b>Dibuat Sejak</b> <a class="float-right">{{ $mahasiswa->dibuat_sejak->format('d-F-Y') }}</a>
                </li>
                <li class="list-group-item">
                  <b>Berakhir</b> <a class="float-right">{{ $mahasiswa->berakhir->format('d-F-Y') }}</a>
                </li>
              </ul>

              <a href="/mahasiswa/edit/{{ $mahasiswa->id }}" class="btn btn-light btn-block"><b>Edit</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
         
          <!-- /.card -->
        </div>
        <!-- /.col -->
        
        <div class="col-md-9">
          <div class="row">
           

            <div class="col-md-3">
              <form action="/absenperbulanadmin/{{$mahasiswa->id }}" method="GET" class="form-group" id="formFilter">
                {{ csrf_field() }}
                <div class="default-select" id="default-select">
                <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
                <option value="0" selected disabled> Pilih Tahun</option>
                  <?php 
                  $year = date('Y');
                  $min = $year - 5;
                  $max = $year;
                  for( $i=$max; $i>=$min; $i-- ) {
                  echo '<option value='.$i.'>'.$i.'</option>';
                  }
                  ?>
              </select>
            
            </div>
            
    
            
            </div>
            <div class="col-md-3">
              
              <div class="default-select" id="default-select">
                <select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="month">
                  <option value="0" selected disabled> Pilih Bulan</option>
                  <option value="01"> Januari</option>
                  <option value="02"> Februari</option>
                  <option value="03"> Maret</option>
                  <option value="04"> April</option>
                  <option value="05"> Mei</option>
                  <option value="06"> Juni</option>
                  <option value="07"> Juli</option>
                  <option value="08"> Agustus</option>
                  <option value="09"> September</option>
                  <option value="10"> Oktober</option>
                  <option value="11"> November</option>
                  <option value="12"> Desember</option>
                </select>
              </div>
            </form>
            </div>

            <div class="col-md-6">

              <button class="genric-btn default-border circle arrow" type="submit" form="formFilter" value="Submit">Cari Data </button>
              <a href="/mahasiswa/absenall/{{ $mahasiswa->id }}" class="genric-btn default-border circle arrow">All</a>
              <button class="genric-btn success-border circle arrow" type="button"  data-toggle="modal" data-target="#modal-keterangan">Tambah Absen <span class="lnr lnr-arrow-right"></span></button>


            </div>

            
          </div>

         
        
          
    
           
         
        

       
       
        
          <br>
        
          <div class="card">
            <div class="card-header p-3">
             
              
            
              {{-- <ul class="nav nav-pills">
                <li class="nav-item"><a class="" href="#activity" data-toggle="tab">Laporan Harian</a></li>
               <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> 
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>  --}}
                <h6>Absen Mahasiswa</h6>
             

              </ul>
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
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Keterangan</th>
                            {{-- <th>Aksi</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                             @foreach($absen as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->tgl->format('d-F-Y') }}</td>
                                <td> {{ $a->user->name }}</td>
                                <td> {{ $a->jam_masuk }}</td>
                                <td> {{ $a->jam_keluar }}</td>
                                <td> {{ $a->keterangan }}</td>
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
                <!-- /.tab-pane -->
                {{-- <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-info"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-comments bg-warning"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-success">
                        3 Jan. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div> --}}
                <!-- /.tab-pane -->

                {{-- <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div> --}}
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <div class="modal fade" id="modal-keterangan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Absen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="/mahasiswa/tambah-absen/{{ $mahasiswa->id }}" method="post">
                @csrf

            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Tanggal </label>
                <input type="date" name="Nm_lab" class="form-control" id="exampleInputEmail1">

              </div> --}}
              <label for="tanggal">Tanggal </label>
              <div class="mt-10">
                <input type="date" name="tanggal" placeholder="Tanggal" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tanggal'" required class="single-input">
              </div>

              <div class="form-select" id="default-select">
                <label for="exampleInputEmail1">Keterangan </label>

                <select name="keterangan">
                  <option value="Izin">Izin</option>
                  <option value="Sakit">Sakit</option>
                  <option value="Tidak Hadir">Tidak Hadir</option>
                 
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
  <!-- /.modal -->





@endsection
@extends('dashboard.admin')

@section('content')



  <section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    {{-- <h1 class="mb-10"> Ubah Data Mahasiswa</h1> --}}
                    {{-- <p>There is a moment in the life of any aspiring.</p> --}}
                </div>
            </div>
        </div>						
        <div class="row">
        

<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-lg-12">
        <!-- general form elements -->
        <div class="card card-light">
          <div class="card-header">
            {{-- <h3 class="card-title">Form Ubah Data Mahasiswa</h3> --}}
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/mahasiswa/update/{{ $mahasiswa->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nim</label>
                <input type="text" name="nim" class="form-control" id="exampleInputEmail1" value={{ $mahasiswa->nim }}>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Nama Mahasiswa</label>
                <input type="text" name="nm_mahasiswa" class="form-control" id="exampleInputPassword1" value={{ $mahasiswa->nm_mahasiswa  }}>
              </div>

              
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <textarea  name="alamat" class="form-control" rows="3"> {{ $mahasiswa->alamat }}</textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">No Handphone</label>
                <input type="text" name="no_hp" class="form-control" id="exampleInputPassword1" value={{ $mahasiswa->no_hp }}>
              </div>

             
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control" name="id_jurusan">
                    @foreach($jurusan as $jr)
                    <option value="{{ $jr->id }}"{{ $mahasiswa->id_jurusan == $jr->id ? 'selected' : '' }}>{{ $jr->nama_jurusan }}</option>
  
                    @endforeach
                  </select>
                </div>
  
                <div class="form-group">
                  <label>Shift</label>
                  <select class="form-control" name="id_shift">
                    @foreach($shift as $s)
                    <option value="{{ $s->id }}" {{ $mahasiswa->id_shift == $s->id ? 'selected' : '' }}>{{ $s->nm_shift }}</option>
                    
                    @endforeach
                  </select>
                </div>
              
                <div class="form-group">
                    <label for="exampleInputPassword1">Dibuat Sejak</label>
                    <input type="date" name="dibuat_sejak" class="form-control" id="exampleInputPassword1" value={{ $mahasiswa->dibuat_sejak }}>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Berakhir</label>
                    <input type="date" name="berakhir" class="form-control" id="exampleInputPassword1" value={{ $mahasiswa->berakhir }}>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    @if($errors->has('password'))
                    <span class="help-block"  style="color:red;">{{$errors->first('password')}} </span>

                @endif
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Avatar</label>
                    <input type="file" name="avatar" class="form-control" id="exampleInputPassword1">
                  </div>

            </div>
            <div class="card-footer">
                <a href="/homeadmin" class="btn btn-default float-left">Kembali </a>
              <button type="submit" class="btn btn-primary float-right">Update</button>
            </div>
          </form>
        </div>
   
</section>



@endsection
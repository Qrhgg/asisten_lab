@extends('template.landing')

@section('content')


<section class="search-course-area relative" style="background:unset;">
  
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-md-6 search-course-left">
                <h1 class="text">
                    Asisten Lab Komputer <br>
                    LP3I College Banda Aceh
                </h1>
                <p>
                   Dalam Studi Program Application Software Enginering, Seorang mahasiswa di wajibkan mengikuti Program Asisten Lab Komputer 
                </p>
                
            </div>
            <div class="col-lg-7 col-md-6 search-course-right section-gap">
                <form class="form-wrap" action="/prosesregister" method="post">
                    @csrf
                    <h4 class=" pb-20 text-center mb-30">Register</h4>	

                    
                    <input type="number" class="form-control" name="nim" placeholder="Nim" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nim'"  autocomplete='off' value="{{ old('nim') }}">
                    @if($errors->has('nim'))
                        <span class="help-block"  style="color:red;">{{$errors->first('nim')}} </span>

                    @endif
                   
                    <input type="text" class="form-control" name="nm_mahasiswa" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" autocomplete='off' value="{{ old('nm_mahasiswa') }}">
                      @if($errors->has('nm_mahasiswa'))
                        <span class="help-block" style="color:red;">{{$errors->first('nm_mahasiswa')}} </span>

                    @endif
                    <input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" autocomplete='off' value="{{ old('email') }}">
                    @if($errors->has('email'))
                    <span class="help-block"  style="color:red;">{{$errors->first('email')}} </span>

                @endif
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'" value="{{ old('alamat') }}">
                    @if($errors->has('alamat'))
                    <span class="help-block"  style="color:red;">{{$errors->first('alamat')}} </span>

                @endif
                    <input type="number" class="form-control" name="no_hp" placeholder="No Hp" onfocus="this.placeholder = ''" onblur="this.placeholder = 'No Hp'" value="{{ old('no_hp') }}">
                    @if($errors->has('no_hp'))
                    <span class="help-block"  style="color:red;">{{$errors->first('no_hp')}} </span>

                @endif
                    <div class="form-select" id="service-select">
                        <select name="id_jurusan">
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusan as $jr) 
                            
                           
                            <option value="{{ $jr->id }}" {{ old('id_jurusan') == $jr->id ? 'selected' : null }}>{{ $jr->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('id_jurusan'))
                        <span class="help-block"  style="color:red;">{{$errors->first('id_jurusan')}} </span>

                    @endif
                      
                    </div>			
                   
                    <br>
                    <div class="form-select" id="service-select">
                        <select name="id_shift">
                            <option value="">Pilih Shift</option>
                            @foreach($shift as $s)
                           
                            <option value="{{ $s->id }}" {{ old('id_shift') == $s->id ? 'selected' : null }}>{{ $s->nm_shift }}</option>
                           @endforeach
                        </select>
                        @if($errors->has('id_shift'))
                        <span class="help-block"  style="color:red;">{{$errors->first('id_shift')}} </span>

                    @endif
                    </div>				
                   

                    <br>
                    {{-- <label for="">Dibuat seak</label> --}}
                    <input type="date"  class="form-control" name="dibuat_sejak" placeholder="Dibuat Sejak" onfocus="this.placeholder = 'Dibuat Sejak'" onblur="this.placeholder = 'DibuaT Sejak'" value="{{ old('dibuat_sejak') }}">
                    @if($errors->has('dibuat_sejak'))
                    <span class="help-block"  style="color:red;">{{$errors->first('dibuat_sejak')}} </span>

                @endif
                    {{-- <label for="">Berakhir</label> --}}
                    <input type="date"  class="form-control" name="berakhir" placeholder="Berakhir" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Berakhir'" value="{{ old('berakhir') }}" >
                    @if($errors->has('berakhir'))
                    <span class="help-block"  style="color:red;">{{$errors->first('berakhir')}} </span>

                @endif
                    <input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" >
                    @if($errors->has('password'))
                    <span class="help-block"  style="color:red;">{{$errors->first('password')}} </span>

                @endif


                    <button type="submit" class="primary-btn text-uppercase" style="background:rgb(59, 59, 244)";>Register</button>
                </form>
            </div>
        </div>
    </div>	
</section>




@endsection
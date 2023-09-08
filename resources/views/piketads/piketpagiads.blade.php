@extends('dashboard.admin')


@section('content')



<section class="events-list-area section-gap event-page-lists">
    <div class="container">
        <div class="title text-center">
            <h1 class="mb-10"> Jadwal Piket Pagi</h1>
            <p> {{ $shift_pagi->jam_masuk }} - {{ $shift_pagi->jam_keluar }}</p>
        </div>
        <div class="row align-items-center">
            
            @foreach($siswa_pagi as $sp)
            <div class="col-lg-6 pb-30" >
               
               
                <div class="single-carusel row align-items-center">
                    
                    <div class="col-6 col-md-6 thumb">
                        
                        <img class="img-fluid" src="{{ $sp->getAvatar()}}" alt="">
                    </div>
                    <div class="details col-12 col-md-6">
                     
                        <a href="event-details.html"><h4> {{ $sp->nm_mahasiswa }}
                       </h4></a>
                     
                       <ul class="list-group list-group-bordered mb-3">
                        <li class="list-group-item">
                          <b>Jurusan </b> <a class="float-right">{{ $sp->jurusan->nama_jurusan }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Alamat</b> <a class="float-right">{{ $sp->alamat }}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Berakhir</b> <a class="float-right">{{ $sp->berakhir }}</a>
                        </li>
                    
                      
                    </div>
                </div>
               
            </div>
          
            @endforeach
            
           
        </div>
    </div>	
</section>


@endsection
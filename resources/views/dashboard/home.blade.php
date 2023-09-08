@extends('dashboard.admin')

@section('content');


<section class="popular-course-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Jadwal Piket</h1>
                    <p> Asisten Lab Komputer Pada LP3I College Banda Aceh</p>
                </div>
            </div>
        </div>						
        <div class="row">
            
            <div class="active-popular-carusel">
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                            <img class="img-fluid" src="{{asset('/landing_page')}}/img/pagi.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span>{{ $siswa_pagi }}
                            {{-- <h4>$150</h4> --}}
                        </div>									
                    </div>
                    <div class="details">
                       
                        <a href="/piketpagiads">
                            <h4>
                                Pagi
                            </h4>
                        </a>
                 
                        <p>
                           Waktu mulai dari  {{ $shift_pagi->jam_masuk }} - {{ $shift_pagi->jam_keluar }}									
                        </p>
                    </div>
                </div>	
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                            <img class="img-fluid" src="{{asset('/landing_page')}}/img/siang.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> {{ $siswa_siang }} 
                            {{-- <h4>$150</h4> --}}
                        </div>									
                    </div>
                    <div class="details">
                        <a href="/piketsiangads">
                            <h4>
                                Siang
                            </h4>
                        </a>
                        <p>
                            Waktu mulai dari  {{ $shift_siang->jam_masuk }} - {{ $shift_siang->jam_keluar }}										
                        </p>
                    </div>
                </div>	
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                            <img class="img-fluid" src="{{asset('/landing_page')}}/img/malam.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span>  {{ $siswa_malam }}
                            {{-- <h4>$150</h4> --}}
                        </div>									
                    </div>
                    <div class="details">
                        <a href="/piketmalamads">
                            <h4>
                                Malam
                            </h4>
                        </a>
                        <p>
                            Waktu mulai dari  {{ $shift_malam->jam_masuk }} - {{ $shift_malam->jam_keluar }}										
                        </p>
                    </div>
                </div>	
                
                <div class="single-popular-carusel">
                    <div class="thumb-wrap relative">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>	
                            <img class="img-fluid" src="{{asset('/landing_page')}}/img/maintenance-komputer.jpg" alt="">
                        </div>
                        <div class="meta d-flex justify-content-between">
                            <p><span class="lnr lnr-users"></span> {{ $siswa_maintenance }}
                        </div>									
                    </div>
                    <div class="details">
                        <a href="/maintenanceads">
                            <h4>
                                Maintenance
                            </h4>
                        </a>
                        <p>
                       Pada Saat Proses Maintenance diharapkan semua siswa datang								
                        </p>
                    </div>
                </div>	
                
                
                </div>							
            </div>
        </div>
    </div>	

</section>




@endsection
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('/landing_page')}}/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Asisten Lab LP3I College Banda Aceh</title>

    

    {{-- admin lte --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    {{-- css admin template --}}

    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.css"> --}}
    {{-- akhir --}}
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/linearicons.css">
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/bootstrap.css">
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/nice-select.css">							
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/owl.carousel.css">			
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/jquery-ui.css">			
        <link rel="stylesheet" href="{{ asset('/landing_page') }}/css/main.css">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
    </head>
    <body>	
      <header id="header" id="home">
          <div class="header-top">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                          <ul>
                            <li><a href="https://www.facebook.com/lp3ibcbandaaceh"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/lp3i_bandaaceh"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.lp3i.ac.id/campus/lp3i-college-banda-aceh/"><i class="fa fa-chrome"></i></a></li>
                            <li><a href="https://www.instagram.com/lp3ibandaaceh/?hl=id"><i class="fa fa-instagram"></i></a></li>
                          
                          </ul>			
                      </div>
                      <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                        <a href="/profilesaya"><span class="lnr lnr-user"></span> <span class="text">   {{ auth()->user()->name }}</span></a>			
                      </div>
                  </div>			  					
              </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
              <div id="logo">
                <a href="index.html"><img src="{{asset('/landing_page')}}/img/logo_banda-aceh.png" height="50px" alt="" title="" /></a>
              </div>
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li><a href="/homeadmin">Home</a></li>

               
                  @if(auth()->user()->role =='admin')
                  <li><a href="/shift">Jadwal Piket</a></li>
                  <li><a href="/mahasiswa">Mahasiswa</a></li>
                  {{-- <li><a href="/login">Jurusan</a></li> --}}
                  {{-- <li><a href="/login">Lab Komputer</a></li> --}}
                  <li><a href="/laporan-lab">Laporan Lab</a></li>
                  <li><a href="/laporanalat">Laporan alat asisten lab</a></li>

                  @elseif(auth()->user()->role == 'mahasiswa')

                  <li class="menu-has-children"><a href="">Absen</a>
                    <ul>
                      <li><a href="/absenmasuk"> Jam Masuk</a></li>
                      <li><a href="/absenkeluar"> Jam Keluar</a></li>
                    </ul>
                  </li>	

                  <li><a href="/laporanalat">Laporan alat asisten lab</a></li>
                  <li><a href="/laporanmahasiswa">Laporan Mahasiswa</a></li>
                  @endif
                  <li><a href="/logout">Logout</a></li>
                  {{-- <li><a href="courses.html">Jadwal Piket</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                    
                  <li><a href="contact.html">Contact</a></li> --}}
                </ul>
              </nav><!-- #nav-menu-container -->		    		
            </div>
        </div>
      </header><!-- #header -->

        <!-- start banner Area -->
        <section class="banner-area relative" id="home">
            <div class="overlay overlay-bg"></div>	
            <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-between">
                    <div class="banner-content col-lg-9 col-md-12">
                        <h1 class="text-uppercase">
                            We Ensure better education
                            for a better world			
                        </h1>
                        {{-- <p class="pt-10 pb-10">
                            In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
                        </p> --}}
                      
                    </div>										
                </div>
            </div>					
        </section>
        <!-- End banner Area -->

        <!-- Start feature Area -->
        
        <!-- End feature Area -->
                
        <!-- Start popular-course Area -->
        @yield('content')
        <!-- End popular-course Area -->
        

        <!-- Start search-course Area -->
        {{-- <section class="search-course-area relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-6 search-course-left">
                        <h1 class="text-white">
                            Asisten Lab Komputer <br>
                            LP3I College Banda Aceh
                        </h1>
                        <p>
                           Dalam Studi Program Application Software Enginering, Seorang mahasiswa di wajibkan mengikuti Program Asisten Lab Komputer 
                        </p>
                        <div class="row details-content">
                           
                            <div class="col single-detials">
                                <span class="lnr lnr-license"></span>
                                <a href="#"><h4>Sertifikat</h4></a>		
                                <p>
                                   setelah mengikuti dan menjalani Asisten lab selama 6 bulan, seorang mahasiswa akan mendapatkan Sertifikat
                                </p>						
                            </div>								
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 search-course-right section-gap">
                        <form class="form-wrap" action="#">
                            <h4 class="text-white pb-20 text-center mb-30">Daftar</h4>		
                            <input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nim'" >
                            <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" >
                            <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" >
                            <div class="form-select" id="service-select">
                                <select>
                                    <option datd-display="">Choose Course</option>
                                    <option value="1">Course One</option>
                                    <option value="2">Course Two</option>
                                    <option value="3">Course Three</option>
                                    <option value="4">Course Four</option>
                                </select>
                            </div>						
                            <br>
                            <div class="form-select" id="service-select">
                                <select>
                                    <option datd-display="">Choose Course</option>
                                    <option value="1">Course One</option>
                                    <option value="2">Course Two</option>
                                    <option value="3">Course Three</option>
                                    <option value="4">Course Four</option>
                                </select>
                            </div>				
                            
                            <br>
                            <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" >
                            <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" >

                            <button class="primary-btn text-uppercase">Submit</button>
                        </form>
                    </div>
                </div>
            </div>	
        </section> --}}
        <!-- End search-course Area -->
        
    
        <!-- Start upcoming-event Area -->
       

        <!-- End upcoming-event Area -->
                    
        
        <!-- End review Area -->	
        
        <!-- Start cta-one Area -->
        
        <!-- End cta-one Area -->

        <!-- Start blog Area -->
        
        <!-- End blog Area -->			
        

        <!-- Start cta-two Area -->
      
        <!-- End cta-two Area -->
                    
        <!-- start footer Area -->		
        <footer class="footer-area">
            <div class="container">
              
                <div class="footer-bottom row align-items-center justify-content-between">
                    <p class="footer-text-white m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><b>
Copyright All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i>by Qomatur rahman harahap</a></b>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    
                </div>						
            </div>
        </footer>	
        <!-- End footer Area -->	


        <script src="{{ asset('/landing_page') }}/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('/landing_page') }}/js/vendor/bootstrap.min.js"></script>			
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="{{ asset('/landing_page') }}/js/easing.min.js"></script>			
        <script src="{{ asset('/landing_page') }}/js/hoverIntent.js"></script>
        <script src="{{ asset('/landing_page') }}/js/superfish.min.js"></script>	
        <script src="{{ asset('/landing_page') }}/js/jquery.ajaxchimp.min.js"></script>
        <script src="{{ asset('/landing_page') }}/js/jquery.magnific-popup.min.js"></script>	
        <script src="{{ asset('/landing_page') }}/js/jquery.tabs.min.js"></script>						
        <script src="{{ asset('/landing_page') }}/js/jquery.nice-select.min.js"></script>	
        <script src="{{ asset('/landing_page') }}/js/owl.carousel.min.js"></script>									
        <script src="{{ asset('/landing_page') }}/js/mail-script.js"></script>	
        <script src="{{ asset('/landing_page') }}/js/main.js"></script>	
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
        

        {{-- js admin template
        <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="{{ asset('assets') }}/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="{{ asset('assets') }}/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="{{ asset('assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets') }}/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('assets') }}/dist/js/pages/dashboard.js"></script>
        
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- SweetAlert2 -->
        <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
         --}}
        {{-- akhir --}}


        {{-- admin lte --}}
        <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>




<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange":true, "autoWidth": false,
      "buttons": ["pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });


  });
  </script>
@if(Session::has('sukses'))
<script>

$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000

    
  });

    Toast.fire({
      icon: 'success',
      title:"{{ Session::get('sukses')}}"
    })
  });
</script>

@endif
{{-- Session Data Berhasil Dihapus --}}
@if(Session::has('hapus'))
<script>

$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000

    
  });

    Toast.fire({
      icon: 'error',
      title:"{{ Session::get('hapus')}}"
    })
  });

</script>
@endif


@if(Session::has('edit'))
<script>

$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000

    
  });

    Toast.fire({
      icon: 'info',
      title:"{{ Session::get('edit')}}"
    })
  });

</script>
@endif


@if(Session::has('status'))
<script>

$(function() {
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000

    
  });

    Toast.fire({
      icon: 'error',
      title:"{{ Session::get('status')}}"
    })
  });

</script>
@endif



    </body>
</html>
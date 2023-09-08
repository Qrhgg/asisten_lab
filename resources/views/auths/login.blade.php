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
                <form class="form-wrap" action="/postlogin" method="post">
                    @csrf 
                    <h4 class=" pb-20 text-center mb-30">Login</h4>		
                    <input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" >
                    <input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" >
                   

                    <button type="submit" class="primary-btn text-uppercase" style="background:rgb(59, 59, 244)";>Login</button>
                </form>
            </div>
        </div>
    </div>	
</section>




@endsection
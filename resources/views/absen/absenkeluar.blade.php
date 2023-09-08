<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="{{ asset('Js/jam.js') }}"></script>
<style> 
    #watch{
        color:rgb(252, 150, 65 );
        position: absolute;
        z-index: 1;
        height: 40px;
        width: 700px;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right:0;
        font-size: 10vw;
        -webkit-text-stroke: 3px rgb(210,65,26);
        text-shadow: 4px 4px 10px rgb(210, 65, 36, 0.4),
                     4px 4px 20px rgb(210, 45, 26, 0.4)
                     4px 4px 30px rgb(210, 25, 16, 0.4)
                     4px 4px 40px rgb(210, 15, 06, 0.4);
    }

</style>

</head>
<body onload="realTimeClock()">
    
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
            <div class="card-body">
                <form action="/simpankeluar" method="post">
                    @csrf
                    <div class="form-group">
                        <center>
                            <label id="clock" style="font-size: 100px; color:#ed1c46;
                                        text-shadow: 4px 4px 10px #9f999d;">

                                        {{-- 4px 4px 20px #36D6FE,
                                        4px 4px 30px #36D6FE,
                                        4px 4px 40px #36D6FE;"> --}}

                                        </label>


                            <center>
                            </div>
                            <center>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Klik Untuk Absen Keluar </button>
                                </div>
                                <center>

                               
                   



                </form>

            </div>


        </section>





@endsection










</body>
</html>
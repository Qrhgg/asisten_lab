<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
 use Illuminate\Database\Query\JoinClause;
use App\Models\LaporanAlat;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    //    $data_siswa = DB::table('mahasiswa')
    //     ->join('users', function (JoinClause $join) {
    //         $join->on('mahasiswa.user_id', '=', 'users')
    //              ->where('users.id',  'status', 'Aktif');
    //     })
    //     ->get();

     $data_siswa = Mahasiswa::all();

       
       $jurusan = Jurusan::all();   
       $shift = Shift::all();


    //    $aktifasi = DB::table('users')->where('status', 'Tidak Aktif')->with('siswa')->get();
       $aktifasi = User::where('status', 'Tidak Aktif')->with('siswa')->get();



        return view('mahasiswa.index', ['data_siswa' => $data_siswa, 'jurusan' => $jurusan, 'shift' => $shift, 'aktifasi' => $aktifasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        

        //insert ke tabel user
        $user = new User;
        $user->role= 'mahasiswa';
        $user->name = $request->nm_mahasiswa;
        $user->email =$request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert ke tabel mahasiswa; 
        $request->request->add(['user_id' => $user->id]);
        Mahasiswa::create($request->all());

        return redirect('/mahasiswa')->with('sukses', 'Mahasiswa Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
       $jurusan = Jurusan::all();   
       $shift = Shift::all();
        
        
        return view('mahasiswa/edit', ['mahasiswa' => $mahasiswa, 'jurusan' => $jurusan, 'shift' => $shift]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[

           
            'password' => 'required|min:5',
            

        ],
        [

           
            'password.required' => 'password baru harus di isi',
            'password.min' => 'password terlalu pendek',
      

        ]);


        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        $user = DB::table('users')
        ->where('id', $mahasiswa->user_id)
        ->update(['password' => bcrypt ($request->password)]);

      
        

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $mahasiswa->avatar = $request->file('avatar')->getClientOriginalName();
            $mahasiswa->save();
        }
        

        return redirect('/dashboard')->with('edit', 'Mahasiswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    {



        $mahasiswa=Mahasiswa::find($id);
        
         $user = User::where('id', $mahasiswa->user_id)->delete();

         $laporanalat = LaporanAlat::where('mahasiswa_pemberi', $mahasiswa->id)->delete();

         $absen = Absen::where('mahasiswa_id', $mahasiswa->id)->delete();
        
        $mahasiswa->delete();

        // dd($user);

        return redirect('/mahasiswa')->with('hapus', 'Mahasiswa Berhasil Dihapus !');
    }

    public function profile($id){

        $mahasiswa=Mahasiswa::find($id);
        // $userabsen = DB::table('users')->select('id')->where('id', $mahasiswa->user_id);
        
        

        $absen = Absen::where('mahasiswa_id',  $mahasiswa->id )->orderBy('tgl', 'asc')->get();

        
        
    
        
       
        

        return view('mahasiswa.profile', ['mahasiswa' => $mahasiswa, 'absen' => $absen]);

    }


    public function profilesaya(){

        $mahasiswa = auth()->user()->siswa;
        // $absen = auth()->user()->absen;
        $absen = Absen::where('user_id', auth()->user()->id)->orderBy('tgl', 'asc')->get();

        return view('mahasiswa.profilesaya', compact(['mahasiswa', 'absen']));
    }

    public function absenFilter(Request $request){
        $month = $request->get('month');
        $year = $request->get('year');

        $mahasiswa = auth()->user()->siswa;
      
       
            
        $absen = Absen::whereYear('created_at', '=', $year)
                  ->whereMonth('created_at', '=', $month)
                    ->where('mahasiswa_id', $mahasiswa->id )
                  ->get();
            
            
            return view('mahasiswa.profilesaya', ['absen' => $absen, 'mahasiswa' => $mahasiswa]);
        }

        public function absenFilteradmin(Request $request, $id){
             
        

            $month = $request->get('month');
            $year = $request->get('year');
    
            $mahasiswa=Mahasiswa::find($id);
          
           
                
            $absen = Absen::whereYear('tgl', '=', $year)
                      ->whereMonth('tgl', '=', $month)
                        ->where('mahasiswa_id', $mahasiswa->id)
                      ->get();
                
                
                
                return view('mahasiswa.profile', ['absen' => $absen, 'mahasiswa' => $mahasiswa]);
            }
   
            public function absenall($id){

                $mahasiswa=Mahasiswa::find($id);
                // $userabsen = DB::table('users')->select('id')->where('id', $mahasiswa->user_id);
                
                
        
                $absen = Absen::where('mahasiswa_id',  $mahasiswa->id )->orderBy('tgl', 'asc')->get();
        
                
                
            
                
               
                
        
                return view('mahasiswa.profile', ['mahasiswa' => $mahasiswa, 'absen' => $absen]);

            }


            public function aktifasi(Request $request, $id){

                $user = User::find($id);
                 $user->update($request->all());

                // $user = User::where('id', '$id')->update(['status' => ($request->status)]);
                // $user->status = $request->status;
                // $user->save();

                return redirect('/mahasiswa')->with('success', 'Mahasiswa Berhasil Di Aktifkan !');
            }

            public function hapusakun ($id){

                $user = User::find($id);
                $user->delete();


                return redirect('/mahasiswa')->with('hapus', 'Mahasiswa Berhasil Di Hapus !');

            }


        }

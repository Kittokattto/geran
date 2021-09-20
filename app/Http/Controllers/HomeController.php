<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bookmark;
use App\Failkes;
use App\User;
use App\Tugas;
use Auth;
use App\Lokasi;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $geran = Failkes::count();
        $bookmark = Bookmark::where('id_user', '=', $userid )->get()->toArray();
        $jumlah_book = Bookmark::where('id_user', '=', $userid )->count();
        $pengguna = User::where('soft_delete', '=', 0)->count();
        $user = User::orderBy('created_at', 'desc')->where('soft_delete','=', 0)->paginate(4);
        $fail = Failkes::orderBy('created_at', 'desc')->where('softdelete','=', 0)->paginate(6);

        
        $selesai = Tugas::where([['id_user', '=', $userid], ['status', '=', 3]])->count();
        $total =  Tugas::where('id_user', '=', $userid)->count();
        $percent = '0';

        if($selesai != 0 || $selesai != null)
        {
          $percent = round((($selesai / $total )*100), 0);
          
        }
        
        $totalfile = Failkes::count();
        $pajakan = Failkes::where('tajuk_geran', '=', 'Pajakan')->count();
        $pajakanM = Failkes::where('tajuk_geran', '=', 'Pajakan Mukim')->count();
        $geraN = Failkes::where('tajuk_geran', '=', 'Geran')->count();
        $geranM = Failkes::where('tajuk_geran', '=', 'Geran Mukim')->count();
        $hsmukim = Failkes::where('tajuk_geran', '=', 'Hakmilik Sementara Mukim')->count();
        $hsdaerah = Failkes::where('tajuk_geran', '=', 'Hakmilik Sementara Daerah')->count();
        $geranpadam = Failkes::where('softdelete', '=', 1)->count();

        if($pajakan != 0 || $pajakan != null)
        {
          $percentP = round((($pajakan / $totalfile )*100), 0);
          
        }
        if($pajakanM != 0 || $pajakanM != null)
        {
          $percentPM = round((($pajakanM / $totalfile )*100), 0);
          
        }
        if($geraN != 0 || $geraN != null)
        {
          $percentG = round((($geraN / $totalfile )*100), 0);
          
        }
        if($geranM != 0 || $geranM != null)
        {
          $percentGM = round((($geranM / $totalfile )*100), 0);
          
        }
        if($hsmukim != 0 || $hsmukim != null)
        {
          $percentHSM = round((($hsmukim / $totalfile )*100), 0);
          
        }
        if($hsdaerah != 0 || $hsdaerah != null)
        {
          $percentHSD = round((($hsdaerah / $totalfile )*100), 0);
          
        }
        if($geranpadam != 0 || $geranpadam != null)
        {
          $percentpadam = round((($geranpadam / $totalfile )*100), 0);
          
        }
        

        // if($request->ajax())

    	// {
    	// 	$data;
        //     return response()->json($data);
    	// }
        

        return view('home' ,compact('bookmark','geran', 'user','pengguna', 'fail', 'jumlah_book', 'percent','percentpadam', 'percentpadam', 'percentHSD', 'percentHSM', 'percentGM', 'percentG', 'percentP', 'percentPM'));
    }
}

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
        $pengguna = User::count();
        $user = User::orderBy('created_at', 'desc')->where('soft_delete','=', 0)->paginate(4);
        $fail = Failkes::orderBy('created_at', 'desc')->where('softdelete','=', 0)->paginate(6);

        
        $selesai = Tugas::where([['id_user', '=', $userid], ['status', '=', 3]])->count();
        $total =  Tugas::where('id_user', '=', $userid)->count();
        $percent = '0';

        if($selesai != 0 || $selesai != null)
        {
          $percent = round((($selesai / $total )*100), 0);
          
        }
        

        // if($request->ajax())

    	// {
    	// 	$data;
        //     return response()->json($data);
    	// }

        return view('home' ,compact('bookmark','geran', 'user','pengguna', 'fail', 'jumlah_book', 'percent'));
    }
}

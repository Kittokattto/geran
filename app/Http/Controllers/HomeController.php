<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bookmark;
use App\Failkes;
use App\User;
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
        $pengguna = User::count();
        $user = User::where('id', '=', $userid)->first();
        return view('home' ,compact('bookmark','geran', 'user','pengguna'));
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Bookmark;

class Bookmarkcontroller extends Controller
{
    //

    public function setbookmark(Request $request)
    {
        $userid = Auth::user()->id;

        $geran_id = $request->geran_id;

        $book = new Bookmark;
        $book->id_user = $userid;
        $book->id_geran = $geran_id;

        $book->save();
    }

//     public function setbookmark(Request $request)
//    {
//         $userid = Auth::user()->id;
//         $geran_id = $request->geran_id;

//         $book = new Bookmark;
//         $book->id_user = $userid;
//         $book->id_geran = $geran_id;

//         $book->save();
//     }

    public function removebookmark(Request $request)
    {
        
        $userid = Auth::user()->id;
         $geran_id = $request->geran_id;
         $book = Bookmark::where([['id_geran','=', $geran_id],['id_user','=', $userid]])->first();
         
         if(!empty($book))
         {
             $book->delete();
         }


     } 
}

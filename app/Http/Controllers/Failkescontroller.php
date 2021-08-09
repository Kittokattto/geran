<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Failkes;
use App\Access;
use App\Bookmark;
use App\User;

class Failkescontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $geran = Failkes::with(['registerby'])->orderBy('created_at','desc')->where('softdelete', '=', 0)->paginate(20);
		

            $newfileid = getNewFileID();
            $id = Auth::user()->id;
            $status = 'View';

            $access = new Access;
            $access->id_file = $newfileid;
            $access->id_user = $id;
            $access->status =  $status;
            $access->save();
    
		return view('failkes.senarai',compact('geran')); 

    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('/failkes/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        
        $softdelete = 0;
        $this->validate($request, [
       
            'tajuk' => 'required', 
            'no_hakmilik' => 'required|regex:/^[0-9]+$/',
            'pemilik' => 'required|regex:/^[a-zA-Z\s]+$/',
            'daerah' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lot' => 'required|regex:/^[a-zA-Z0-9]*$/',  
            'luas' => 'required|string',
            'no_pelan' => 'required',
            'no_fail' => 'required',
            'daftar' => 'required|date_format:Y-m-d',
            'keluaran' => 'nullable|date_format:Y-m-d',
            'file' => 'mimes:jpeg,bmp,png,jpg,svg|max:500000',
            'no_hakmilik' => 'required|regex:/^[0-9]+$/',
            'negeri' => 'required',
            'no_lembaran' => 'required',
            'ic' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/',
            'warga' => 'required|regex:/^[a-zA-Z\s]+$/',
            'cukai' => 'required|',
            'alamat' => 'required'




        ]);



        try{




                $geran = new Failkes;
                
                //categori geran
                $geran->tajuk_geran = trim($request['tajuk']);
                $geran->no_hakmilik = $request['no_hakmilik'];
                $geran->cukai =  $request['cukai'];

                //maklumat geran
                $geran->tempat = trim ($request['tempat']);
                $geran->negeri = $request['negeri'];
                $geran->daerah = $request['daerah'];
                $geran->no_lot = $request['lot'];
                $geran->luas_lot = trim( $request['luas']);
                $geran->kategori_tanah = trim( $request['kategori']);
                $geran->no_lembaran = trim( $request['no_lembaran']);
                $geran->no_pelan = trim( $request['no_pelan']);
                $geran->no_fail = trim( $request['no_fail']);
                $geran->no_pt = trim( $request['no_pt']);
                $geran->no_permohonan = trim( $request['no_permohonan']);

                //syarat
                $geran->syarat = trim( $request['syarat']);
                $geran->syarat_kepentingan = $request['kepentingan'];
                $geran->urusan = $request['urusan'];    

                //tarikh
                $geran->tarikh_daftar = $request['daftar'];
                $geran->tempoh = $request['tempoh'];
                $geran->tarikh_keluaran = $request['keluaran'];

                //rekod tuanpunya
                $geran->ic = trim( $request['ic']);
                $geran->warga_negara = trim( $request['warga']);
                $geran->pemilik = trim ($request ['pemilik']);
                $geran->alamat = trim ($request ['alamat']);

                //utk DB
                $geran->registerBy  =$userid;
                $geran->softdelete  =$softdelete;
                $geran->rizab = $request['rizab'];
            

               

          
          

                $geran->save();
                if($geran->save())
                {
                    $newfileid = getNewFileID();
                    $status = 'Tambah';

                    $access = new Access;
                    $access->id_file = $newfileid;
                    $access->id_user = $userid;
                    $access->status =  $status;
                    $access->save();

                    if (request()->has('file'))
                    {
                        $geran->update([
                            'gambar_lot' => request()->file->store('uploads', 'public'),
                        ]);
                    }
                }
            //redirect
            return redirect('/failkes/senarai')->with('message',' Successfully Added');
            
        }
        catch(Exception $e){
            //throw new Exception('Throw exception test'); //enable this to test exceptions
             throw new Exception("Could not save data, Please contact us if it happends again.");
             return back()->withError($e->getMessage())->withInput();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $geran = Failkes::where('geran_id','=',$id)->first();

        $userid = Auth::user()->id;
        $bookmark = Bookmark::where([['id_user','=', $userid], ['id_geran', '=', $id]])->first();

        return view ('failkes.view',compact('geran','bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $geran = Failkes::where('geran_id','=',$id)->first();

        return view ('failkes.edit',compact('geran'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        //
        $search = $request->get('search');
        $column = $request->get('type');

        // if($column == 'registerBy')
        // {
        //     $userid = User::where ('name', '=', '%'.$search );
        //     $geran = Failkes::where( $column,'=', $userid)->paginate(20);
        //     return view('failkes.senarai',compact('geran')); 
        // }
        $geran = Failkes::where( $column,'like', '%'.$search.'%')->paginate(20);
        return view('failkes.senarai',compact('geran')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $userid = Auth::user()->id;
        
        $softdelete = 0;
        $this->validate($request, [
       
            'tajuk' => 'required', 
            'no_hakmilik' => 'required|regex:/^[0-9]+$/',
            'pemilik' => 'required|regex:/^[a-zA-Z\s]+$/',
            'daerah' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lot' => 'required|regex:/^[a-zA-Z0-9]*$/',  
            'luas' => 'required|string',
            'no_pelan' => 'required',
            'no_fail' => 'required',
            'daftar' => 'required|date_format:Y-m-d',
            'keluaran' => 'nullable|date_format:Y-m-d',
            'file' => 'mimes:jpeg,bmp,png,jpg| max:500000',
            'no_hakmilik' => 'required|regex:/^[0-9]+$/',
            'negeri' => 'required',
            'no_lembaran' => 'required',
            'ic' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/',
            'warga' => 'required|regex:/^[a-zA-Z\s]+$/',
            'cukai' => 'required|',
            'alamat' => 'required'




        ]);



        try{




                $geran = Failkes::find($id);
                
                //categori geran
                $geran->tajuk_geran = trim($request['tajuk']);
                $geran->no_hakmilik = $request['no_hakmilik'];
                $geran->cukai =  $request['cukai'];

                //maklumat geran
                $geran->tempat = trim ($request['tempat']);
                $geran->negeri = $request['negeri'];
                $geran->daerah = $request['daerah'];
                $geran->no_lot = $request['lot'];
                $geran->luas_lot = trim( $request['luas']);
                $geran->kategori_tanah = trim( $request['kategori']);
                $geran->no_lembaran = trim( $request['no_lembaran']);
                $geran->no_pelan = trim( $request['no_pelan']);
                $geran->no_fail = trim( $request['no_fail']);
                $geran->no_pt = trim( $request['no_pt']);
                $geran->no_permohonan = trim( $request['no_permohonan']);

                //syarat
                $geran->syarat = trim( $request['syarat']);
                $geran->syarat_kepentingan = $request['kepentingan'];
                $geran->urusan = $request['urusan'];    

                //tarikh
                $geran->tarikh_daftar = $request['daftar'];
                $geran->tempoh = $request['tempoh'];
                $geran->tarikh_keluaran = $request['keluaran'];

                //rekod tuanpunya
                $geran->ic = trim( $request['ic']);
                $geran->warga_negara = trim( $request['warga']);
                $geran->pemilik = trim ($request ['pemilik']);
                $geran->alamat = trim ($request ['alamat']);

                //utk DB
                
                $geran->softdelete  =$softdelete;
                $geran->rizab = $request['rizab'];


                $geran->save();

                if($geran->save())
                {
                    $newfileid = $id;
                    $id = Auth::user()->id;
                    $status = 'Edit';

                    $access = new Access;
                    $access->id_file = $newfileid;
                    $access->id_user = $id;
                    $access->status =  $status;
                    $access->save();
                }
                return redirect('/failkes/senarai')->with('message','Successfully Updated');
            }
            catch(Exception $e){
                //throw new Exception('Throw exception test'); //enable this to test exceptions
                 throw new Exception("Could not save data, Please contact us if it happends again.");
                 return back()->withError($e->getMessage())->withInput();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $geran= Failkes::where('geran_id','=',$id)->update(['softdelete' => 1]);

        $newfileid = getNewFileID();
            $id = Auth::user()->id;
            $status = 'Soft Delete';

            $access = new Access;
            $access->id_file = $newfileid;
            $access->id_user = $id;
            $access->status =  $status;
            $access->save();

        return redirect('failkes/senarai')->with('message','Successfully Deleted');
    }

    public function indexdelete()
    {
        //
        $geran = Failkes::with(['registerby'])->orderBy('created_at','desc')->where('softdelete', '=', 1)->paginate(20);
		

            
		return view('failkes.senaraipadam',compact('geran')); 

    }

    public function restore($id)
    {
        //
        $geran= Failkes::where('geran_id','=',$id)->update(['softdelete' => 0]);

        $newfileid = $id;
            $id = Auth::user()->id;
            $status = 'Restore';

            $access = new Access;
            $access->id_file = $newfileid;
            $access->id_user = $id;
            $access->status =  $status;
            $access->save();

        return redirect('failkes/senarai')->with('message','Successfully Restored');
    }

    public function permenantdelete($id)
    {
        $geran = Failkes::find($id);
        $geran->delete();


        return redirect('failkes/senaraipadam')->with('message','Successfully Deleted');
    }

}

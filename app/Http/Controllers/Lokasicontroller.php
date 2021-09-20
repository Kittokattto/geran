<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Lokasi;
use App\Failkes;

class Lokasicontroller extends Controller
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
        $lokasi = Lokasi ::with(['user','hakmilik'])->orderBy('created_at','desc')->where('softdelete', '=', 0)->paginate(20);

        return view('lokasi.senarai',compact('lokasi')); 
    }


    public function indexdelete()
    {
        //
        $lokasi = Lokasi ::with(['user','hakmilik'])->orderBy('created_at','desc')->where('softdelete', '=', 1)->paginate(20);

        return view('lokasi.senaraipadam',compact('lokasi')); 

    }
    public function restore($id)
    {
        //
        $lokasi= Lokasi::where('id','=',$id)->update(['softdelete' => 0]);

        return redirect('lokasi/senarai')->with('message','Successfully Restored');
    }

    public function permenantdelete($id)
    {
        $lokasi = Lokasi::find($id);
        $lokasi->delete();


        return redirect('lokasi/senaraipadam')->with('message','Successfully Deleted');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('/lokasi/tambah');

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
        $lokasi = Lokasi::where( $column,'like', '%'.$search.'%')->paginate(20);
        return view('lokasi.senarai',compact('lokasi')); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $userid = Auth::user()->id;
        
        $softdelete = 0;
        $this->validate($request, [
       
            'tajuk' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lokasi' => 'required|string', 
            'copy' => 'required|regex:/^[0-9]+$/',
            'status' => 'required|regex:/^[a-zA-Z\s]*$/',
            'date' => 'required',

            'no_hakmilik' => 'required|regex:/^[0-9]+$/',
            'negeri' => 'required|regex:/^[a-zA-Z\s]+$/',
            'daerah' => 'required|regex:/^[a-zA-Z\s]+$/',
            'lot' => 'required|regex:/^[a-zA-Z0-9]*$/',
            'no_lembaran' => 'required|string',
            'no_fail' => 'required|string',
            'ic' => 'required|regex:/^\d{6}-\d{2}-\d{4}$/'


        ]);
        
        try{




                $lokasi = new Lokasi;
                $lokasi->tajuk_file = trim($request['tajuk']);
                $lokasi->jenis_file = trim($request['jenis']);
                $lokasi->lokasi = trim ($request ['lokasi']);
                $lokasi->copy = $request['copy'];
                $lokasi->status = trim( $request['status']);
                $lokasi->date_locate = $request['date'];

                //to link

                $ic = trim ($request['ic']);
                $no_hakmilik = $request['no_hakmilik'];
                $negeri = trim ($request['negeri']);
                $daerah = trim ($request['daerah']);
                $no_lot =  $request['lot'];
                $no_lembaran = trim ($request['no_lembaran']);
                $kod = trim ($request['no_fail']);
               

                $lokasi->ic = $ic;
                $lokasi->no_hakmilik = $no_hakmilik;
                $lokasi->negeri = $negeri;
                $lokasi->daerah = $daerah;
                $lokasi->no_lot =  $no_lot;
                $lokasi->no_lembaran = $no_lembaran;
                $lokasi->kod =$kod;
                $lokasi->id_user =$userid;
                // $lokasi->softdelete  =$softdelete;

                
               
                $link = Failkes::where([['no_hakmilik','like', $no_hakmilik],['no_lembaran','like', $no_lembaran],['no_fail','like', $kod ]])->first();
                
                if(!empty($link))
                {
                    $lokasi->id_geran = $link->geran_id;
                    $lokasi->save();
                    return view('/lokasi/linklocation',compact('link'));
                }
            //    dd($lokasi);
            
                $lokasi->save();
                $linknew = getNewLocationID();

                $linkbaru = Lokasi::where('id', '=', $linknew )->first();
            
            //redirect
                
                
            return view('/lokasi/adddetails',compact('linkbaru'));
            
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
        //
        $lokasi = Lokasi::where('id','=',$id)->first();
        $geran = Failkes::where('geran_id', '=', $lokasi->id_geran);
        return view ('lokasi.view',compact('lokasi','geran'));
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
        $lokasi = Lokasi::where('id','=',$id)->first();

        return view ('lokasi.edit',compact('lokasi'));
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
   
        
        $softdelete = 0;
        $this->validate($request, [
       
            'tajuk' => 'required|string',
            'lokasi' => 'required|string', 
            
            'copy' => 'required|int',
            'status' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            

        ]);
        
        try{

                $lokasi = Lokasi::find($id);
                $lokasi->tajuk_file = trim($request['tajuk']);
                $lokasi->jenis_file = trim($request['jenis']);
                $lokasi->lokasi = trim ($request ['lokasi']);
                // $lokasi->kod = trim ($request['kod']);
                $lokasi->copy = $request['copy'];
                $lokasi->status = trim( $request['status']);
                $lokasi->date_locate = $request['date'];

                // $lokasi->pemilik = trim ($request['pemilik']);
                // $lokasi->no_hakmilik = $request['no_hakmilik'];
                // $lokasi->negeri = trim ($request['negeri']);
                // $lokasi->daerah = trim ($request['daerah']);
                // $lokasi->no_lot =  $request['lot'];
                // $lokasi->tempat = trim ($request['tempat']);
                // $lokasi->info = trim ($request['info']);
    

                // $lokasi->softdelete  =$softdelete;

            


            
          

                $lokasi->save();

            //redirect
            return redirect('/lokasi/senarai')->with('message',' Successfully Updated');
            
        }
        catch(Exception $e){
            //throw new Exception('Throw exception test'); //enable this to test exceptions
            throw new Exception("Could not save data, Please contact us if it happends again.");
             return back()->withError($e->getMessage())->withInput();
        }

    }

    public function updatelink (Request $request, $id)
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

               

            dd($geran);
          

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

                    $lokasi = Lokasi::find($id);
                    $lokasi->id_geran = $newfileid;
                    $lokasi->negeri = $request['negeri'];
                    $lokasi->daerah = $request['daerah'];
                    $lokasi->no_lot = $request['lot'];
                    $lokasi->no_lembaran = trim( $request['no_lembaran']);
                    $lokasi->no_fail = trim( $request['no_fail']);
                    $lokasi->no_hakmilik = $request['no_hakmilik'];



                }


            //redirect
            return redirect('/lokasi/senarai')->with('message',' Successfully Link');
            
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

        $geran= Lokasi::where('id','=',$id)->update(['softdelete' => 1]);

       

        return redirect('lokasi/senarai')->with('message','Successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Lokasi;

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
       
            'tajuk' => 'required|string',
            'lokasi' => 'required|string', 
            
            'copy' => 'required|regex:/^[0-9]+$/',
            'status' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'no_hakmilik' => 'nullable|regex:/^[0-9]+$/'
            

        ]);
        
        try{




                $lokasi = new Lokasi;
                $lokasi->tajuk_file = trim($request['tajuk']);
                $lokasi->jenis_file = trim($request['jenis']);
                $lokasi->lokasi = trim ($request ['lokasi']);
                $lokasi->kod = trim ($request['kod']);
                $lokasi->copy = $request['copy'];
                $lokasi->status = trim( $request['status']);
                $lokasi->date_locate = $request['date'];

                $lokasi->pemilik = trim ($request['pemilik']);
                $lokasi->no_hakmilik = $request['no_hakmilik'];
                $lokasi->negeri = trim ($request['negeri']);
                $lokasi->daerah = trim ($request['daerah']);
                $lokasi->no_lot =  trim ($request['lot']);
                $lokasi->tempat = trim ($request['tempat']);
                $lokasi->info = trim ($request['info']);
    
                $lokasi->id_user =$userid;
                // $lokasi->softdelete  =$softdelete;

            


            
          

                $lokasi->save();

            //redirect
            return redirect('/lokasi/senarai')->with('message',' Successfully Added');
            
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

        return view ('lokasi.view',compact('lokasi'));
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
            
            'copy' => 'required|regex:/^[0-9]+$/',
            'status' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
            'no_hakmilik' => 'nullable|regex:/^[0-9]+$/'
            

        ]);
        
        try{

                $lokasi = Lokasi::find($id);
                $lokasi->tajuk_file = trim($request['tajuk']);
                $lokasi->jenis_file = trim($request['jenis']);
                $lokasi->lokasi = trim ($request ['lokasi']);
                $lokasi->kod = trim ($request['kod']);
                $lokasi->copy = $request['copy'];
                $lokasi->status = trim( $request['status']);
                $lokasi->date_locate = $request['date'];

                $lokasi->pemilik = trim ($request['pemilik']);
                $lokasi->no_hakmilik = $request['no_hakmilik'];
                $lokasi->negeri = trim ($request['negeri']);
                $lokasi->daerah = trim ($request['daerah']);
                $lokasi->no_lot =  trim ($request['lot']);
                $lokasi->tempat = trim ($request['tempat']);
                $lokasi->info = trim ($request['info']);
    

                // $lokasi->softdelete  =$softdelete;

            


            
          

                $lokasi->save();

            //redirect
            return redirect('/lokasi/senarai')->with('message','Branch Successfully Updated');
            
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

       

        return redirect('failkes/senarai')->with('message','Successfully Deleted');
    }
}

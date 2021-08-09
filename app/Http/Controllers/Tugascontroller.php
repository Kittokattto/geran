<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\User;
use App\Tugas;
use Auth;
use Datetime;
use Datetimezone;
use Illuminate\Http\Request;

class Tugascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('/failkes/tambah');
        $id = getAccessStatusUser();
        
        if ( $id == 'yes')
        {
            $user_name = getUserName();
            
            $task = Tugas::with(['staff'])->where([['tugasBy', '=', $user_name], ['status', '=', 3 ]])->orderBy('created_at','desc')->paginate(10);
            
            return view('/tugas/senaraiadmin' , compact('task'));
        }
        else{

        $userid = Auth::user()->id;
           
         $high = Tugas::where([['id_user', '=', $userid],['keutamaan', '=', 1 ], ['status', '=', 1 ]])->get();
         $medium = Tugas::where([['id_user', '=', $userid],['keutamaan', '=', 2 ], ['status', '=', 1 ]])->get();
         $low = Tugas::where([['id_user', '=', $userid],['keutamaan', '=', 3 ], ['status', '=', 1 ]])->get();


         return view('/tugas/senarai', compact('high', 'low', 'medium'));
        }
    }

    public function index1()
    {
        //return view('/failkes/tambah');
        $id = getAccessStatusUser();
        
        if ( $id == 'yes')
        {
            $user_name = getUserName();
            
            $task = Tugas::with(['staff'])->where([['tugasBy', '=', $user_name], ['status', '=', 1 ]] )->orderBy('created_at','desc')->paginate(10);
            
            return view('/tugas/senaraiadminselesai' , compact('task'));
        }
        else{

        $userid = Auth::user()->id;
           
         $high = Tugas::where([['id_user', '=', $userid],['keutamaan', '=', 1 ], ['status', '=', 3 ]])->get();
         $medium = Tugas::where([['id_user', '=', $userid],['keutamaan', '=', 2 ], ['status', '=', 3 ]])->get();
         $low = Tugas::where([['id_user', '=', $userid],['keutamaan', '=', 3 ], ['status', '=', 3 ]])->get();


         return view('/tugas/senaraiselesai', compact('high', 'low', 'medium'));
        }
    }

    public function add()
    {

        $user = User::where([['soft_delete', '=', 0],['role', '=','staff']])->get();
 
        return view('tugas.tambah', compact('user'));
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
        //
        $adminName = getUserName();
        $status = 1;
    
        $this->validate($request, [
            
            'title' => 'required',
            'tugas' => 'required', 
            'priority' => 'required',
            'tarikh' => 'required',
            
        ]);

        try{

            $tugas = new Tugas;
            $tugas->title = trim($request['title']);
            $tugas->tugas = trim($request['tugas']);
            $tugas->id_user = $request['staf'];
            $tugas->tarikh = $request['tarikh'];

            $tempoh = new DateTime( $tugas->tarikh);
            $skrng = new DateTime('', new DateTimeZone('Asia/Kolkata'));
            $interval = $tempoh->diff($skrng);
            $days = $interval->format('%d hari');
            $tugas->masa = $days;
            
            // $tugas->masa  = $request['time'];
            $tugas->keutamaan = $request['priority'];
            $tugas->tugasBy = $adminName;
            $tugas->status = $status;
            $tugas->save();

        //redirect
        return redirect('/tugas/senaraiadminselesai')->with('message',' Successfully Added');
        
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
        $user = getAccessStatusUser();

        if ( $user == 'yes')
        {
                $task = Tugas::with(['staff'])->where('id','=', $id)->first();
                if($task->status == 1)
                {       
                        $end =$task->tarikh;
                        $tarikh_akhir = new DateTime($end);
                        $now = new DateTime();
                        $interval = $now->diff($tarikh_akhir);
                        $lambat = '';
                    
                            if($tarikh_akhir < $now )
                            {
                                $lambat = 'Lambat';
                                    $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/viewadmin', compact('task', 'days', 'lambat'));

                            }
                            else
                            {
                                $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/viewadmin', compact('task', 'days', 'lambat'));
                            }
                }
                // Kalau Tugas tugas SELESAI kira dari tarikh hantar dgn tarikh akhir
                else
                {
                        $end =$task->tarikh;
                        $finish = $task->finish_at;
                        $tarikh_hantar = new DateTime($finish);
                        $tarikh_akhir = new DateTime($end);
                        // $now = new DateTime();
                        $interval = $tarikh_hantar->diff($tarikh_akhir);
                        $lambat = '';
                                if($tarikh_akhir < $tarikh_hantar )
                                {
                                    $lambat = 'Lambat';
                                    $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/view', compact('task', 'days', 'lambat'));
                                }
                                else
                                {
                                    $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/view', compact('task', 'days', 'lambat'));
                                }
                }

        

        }

        else
        {
            
            $task = Tugas::with(['staff'])->where('id','=', $id)->first();

                // Kalau Tugas tugas TIDAK SELESAI kira dari tarikh sekarang dgn tarikh akhir
            
                if($task->status == 1)
                {       
                        $end =$task->tarikh;
                        $tarikh_akhir = new DateTime($end);
                        $now = new DateTime();
                        $interval = $now->diff($tarikh_akhir);
                        $lambat = '';
                    
                            if($tarikh_akhir < $now )
                            {
                                $lambat = 'Lambat';
                                    $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/view', compact('task', 'days', 'lambat'));

                            }
                            else
                            {
                                $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/view', compact('task', 'days', 'lambat'));
                            }
                }
                // Kalau Tugas tugas SELESAI kira dari tarikh hantar dgn tarikh akhir
                else
                {
                        $end =$task->tarikh;
                        $finish = $task->finish_at;
                        $tarikh_hantar = new DateTime($finish);
                        $tarikh_akhir = new DateTime($end);
                        // $now = new DateTime();
                        $interval = $tarikh_hantar->diff($tarikh_akhir);
                        $lambat = '';
                                if($tarikh_akhir < $tarikh_hantar )
                                {
                                    $lambat = 'Lambat';
                                    $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/view', compact('task', 'days', 'lambat'));
                                }
                                else
                                {
                                    $days = $interval->format('%d hari, %h jam');
                                    return view('/tugas/view', compact('task', 'days', 'lambat'));
                                }
                }
        }
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
        $user = User::where([['soft_delete', '=', 0],['role', '=','staff']])->get();
        $task = Tugas::with(['staff'])->where('id','=', $id)->first();
        $staff  = getUserName($task->id_user);
                $start =$task->created_at; 
                $end =$task->tarikh;
                $start1 = new DateTime('', new DateTimeZone('Asia/Kolkata'));
                $end1 = new DateTime($end);
                $interval = $start1->diff($end1);
                $days = $interval->format('%d hari, %h jam');

        return view('/tugas/edit', compact('task', 'user','days', 'staff'));
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
        $validator = Validator::make($request->all(), [
            
            'file'   => 'mimes:doc,pdf,docx,zip,csv,txt,xlx,xls,md|mas:5000'
        ]);
        
        // $file =request()->file->store('uploads', 'public');
        //                 dd($file);
      
                try{
                    $task = Tugas::find($id);
                    if (request()->has('file'))
                                {   $fileName = time().'_'.$request->file->getClientOriginalName();
                                    $type = $request->file->getClientMimeType();
                                    
                                    // $file =request()->file->store('uploads', 'public');
                                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                                    $task->nama_gambar = time().'_'.$request->file->getClientOriginalName();                   
                                    $task->gambar = '/storage/app/public/' . $filePath;
                                    $task->type = $type;
                                }
                    $task->status = $request->status;
                    $task->comment = trim($request->komen);   
                    $task->finish_at = new DateTime('', new DateTimeZone('Asia/Kolkata'));
                    $task->save();
                    
                //redirect
                return redirect('/tugas/senarai')->with('message',' Successfully Submmited');
                
            }
            catch(Exception $e){
                //throw new Exception('Throw exception test'); //enable this to test exceptions
                throw new Exception("Could not save data, Please contact us if it happends again.");
                    return back()->withError($e->getMessage())->withInput();
                }
        
  
    
    }

    public function updateadmin(Request $request, $id)
    {
        //
        $adminName = getUserName();
    
        $this->validate($request, [
            
            'title' => 'required',
            'tugas' => 'required', 
            'priority' => 'required',
            'tarikh' => 'required',
            
        ]);

        try{

            $tugas = Tugas::find($id);
            $tugas->title = trim($request['title']);
            $tugas->tugas = trim($request['tugas']);
            $tugas->id_user = $request['staf'];
            $tugas->tarikh = $request['tarikh'];
            $tugas->masa  = $request['time'];
            $tugas->keutamaan = $request['priority'];
            $tugas->tugasBy = $adminName;

            
            $tugas->save();

        //redirect
        return redirect('/tugas/senarai')->with('message',' Successfully Update');
        
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
        $geran = Tugas::find($id);
        $geran->delete();

        return redirect('/tugas/senarai')->with('message','Successfully Deleted');
    }
}

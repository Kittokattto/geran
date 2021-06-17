<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;

class PenggunaController extends Controller
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
        
		$user = User::orderBy('created_at','desc')->where('soft_delete', '=', 0)->paginate(20);
		

		return view('pengguna.senarai',compact('user')); 
    }

    public function indexdelete()
    {
        
		$user = User::orderBy('created_at','desc')->where('soft_delete', '=', 1)->paginate(20);
		

		return view('pengguna.senaraipadam',compact('user')); 
    }

    public function restore($id)
    {
        //
        $user= User::where('id','=',$id)->update(['softdelete' => 0]);

        return redirect('pengguna/senarai')->with('message','Successfully Restored');
    }

    public function permenantdelete($id)
    {
        $user = Lokasi::find($id);
        $user->delete();


        return redirect('pengguna/senaraipadam')->with('message','Successfully Deleted');
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('/pengguna/tambah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/pengguna/tambah');
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
        $user = User::where( $column,'like', '%'.$search.'%')->paginate(20);
        return view('pengguna.senarai',compact('user')); 
    }

    
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $adminName = getUserName($userid);
        $softdelete = 0;
        $this->validate($request, [
       
            'name' => 'required|string', 
            'phone' => 'required|unique|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'email' => 'email|unique|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'address' => 'required|string',
            'password' => 'required|string',
            'role' => 'required'
        ]);
        
        try{



            $user = User::create([
                'name' => trim($request['name']),
                'email' => $request['email'],
                'address' => trim($request['address']),
                'department' => $request['department'],
                'phone' => trim($request['phone']),
                'registerBy' => $adminName,
                'soft_delete' => $softdelete,
                'role' => $request['role'],
                'password' => Hash::make($request['password'],
                
                ),
            ]);

          

        
            //redirect
            return redirect('/pengguna/senarai')->with('message','Branch Successfully Added');
            
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
        $user = User::where('id','=',$id)->first();

        return view ('pengguna.view',compact('user'));
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
        $user = User::where('id','=',$id)->first();
   
        return view ('pengguna.edit',compact('user'));
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
		
        $this->validate($request, [
       
            'name' => 'string', 
            'phone' => 'min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'email' => 'email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'address' => 'string',

            'role' => ''
        ]);
            $user = User::find($id);    
            $user->name = trim($request->name);
            $user->phone = trim($request->phone);
            $user->email = $request->email;
            $user->address = trim($request->address);
            $user->department =$request->department;
            $user->role = $request->role;
    
		$user->save();

		return redirect('/pengguna/senarai')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Soft_delete implement so not data lost but stay in database
        $user= User::where('id','=',$id)->update(['soft_delete' => 1]);

        return redirect('pengguna/senarai')->with('message','Successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;   
use App\User;
use App\Socmed;
use App\Tugas;
use Illuminate\Support\Facades\Hash;
class Settingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;

        $socmed = Socmed::where('id_user', '=', $id)->first();
        $user = User::where('id', '=', $id)->first();
         if (getAccessStatusUser() == 'yes')
         {
                    $task = Tugas::where([['tugasBy', '=', getUserName()],['status', '=', '3']])->paginate(4);
         }
         else
         {
                $task = Tugas::where([['id_user', '=', $id],['status', '=', '3']] )->paginate(4);
         }

         if (getAccessStatusUser() == 'yes')
         {
                    $task2 = Tugas::where([['tugasBy', '=', getUserName()],['status', '=', '1']])->paginate(4);
         }
         else
         {
                $task2 = Tugas::where([['id_user', '=', $id],['status', '=', '1']] )->paginate(4);
         }
        return view('user.profile', compact('user','socmed', 'task', 'task2'));
    }

    /**
     * THe create function is for the photo because all name been used
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) 
    {
        $userid = Auth::user()->id;

        $this->validate($request, [
       
            
            'file' => 'mimes:jpeg,png|max:5000',
            // 'file' => 'sometimes|file|image|required|doc,pdf,docx|max:2048'

            

        ]);
      //   $file =request()->file->store('uploads', 'public');

         

        if (request()->has('file'))
                    {
                        $file =request()->file->store('uploads', 'public');
                        $user = User::find($userid);
                        $user->gambar = $file;
                        $user->save();
                        
                    }
        return redirect('/user/profile')->with('message',' Successfully Added');
    }

    public function add()
    {
        //
        return view('user.socmed');
    }

    public function index1($id)
    {
        $user = User::where('id','=',$id)->first();
   
        // return view ('pengguna.edit',compact('user'));
        return view('user.setting', compact('user'));
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
        try
        {
        $soc = new Socmed;
        $soc->inst = trim($request['insta']);
        $soc->linked = trim($request['linked']);
        $soc->facebook = trim($request['facebook']);
        $soc->twitter = trim($request['twitter']);
        $soc->github = trim($request['github']);
        $soc->id_user = $userid;

        $soc->save();

        return redirect('/user/profile')->with('message',' Successfully Added');
            
        }
        catch(Exception $e)
        {
                //throw new Exception('Throw exception test'); //enable this to test exceptions
                throw new Exception("Could not save data, Please contact us if it happends again.");
                 return back()->withError($e->getMessage())->withInput();
        }

    }


public function setting(Request $request, $id)
    {
        //
		
        $this->validate($request, [
       
            'name' => 'string', 
            'phone' => 'min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'email' => 'email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'address' => 'string',

            
        ]);

            $user = User::find($id);    
            $user->name = trim($request->name);
            $user->phone = trim($request->phone);
            $user->email = $request->email;
            $user->address = trim($request->address);
            $user->department =$request->department;
            $user->password = Hash::make($request['password']);
    
		$user->save();

		return redirect('/user/profile')->with('message','Successfully Updated');
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
        $socmed = Socmed::where('id_user', '=', $id)->first();
        return view('user.edit', compact('socmed'));
        
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
        try
        {
        $soc = Socmed::find($id);
        $soc->inst = trim($request['insta']);
        $soc->linked = trim($request['linked']);
        $soc->facebook = trim($request['facebook']);
        $soc->twitter = trim($request['twitter']);
        $soc->github = trim($request['github']);
        $soc->id_user = $userid;

        $soc->save();

        return redirect('/user/profile')->with('message',' Successfully Added');
            
        }
        catch(Exception $e)
        {
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
    }
}

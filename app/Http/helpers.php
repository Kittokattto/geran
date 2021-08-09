<?php


//
if (!function_exists('getNewUserID')) {
	function getNewUserID()
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
		$id = DB::table('users')->max('id');
		$query = DB::table('users')->select('id')->where('id','=', $id)->first();
		if(!empty($query))
		{
			$id_user = $query->id;	
			return $id_user;
		}
	}
}

// if (!function_exists('getUserID')) {
// 	function getNewUserID()
// 	{	
// 		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
// 		$id = Auth::user();
		
// 		if(!empty($id))
// 		{
				
// 			return $id;
// 		}
// 	}
// }

if (!function_exists('getUserName')) {
	function getUserName()
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
		$id = Auth::user()->id;
		$query = DB::table('users')->where('id','=',$id)->first();

		if(!empty($query))
		{
			$username = $query->name;
			return $username;
		}
	}
}


if (!function_exists('getNewFileID')) {
	function getNewFileID()
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
		$id = DB::table('geran')->max('geran_id');
		$query = DB::table('geran')->select('geran_id')->where('geran_id','=', $id)->first();
		if(!empty($query))
		{
			$id_file = $query->geran_id;
			return $id_file;
		}
	}
}


// calculate time 

if (!function_exists('getDay')) {
	function getDay($start)
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
		if(strlen($task->tugas) > 50)
		{
			$mula = substr($start, 0,40) . '...';
		}
		else
		{ 
			$mula = $start;
		}
		
			return $mula;
	
	}
}

// check length string to display in list

if (!function_exists('getLength')) {
	function getLength($start)
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
	
		if(strlen($start) > 100)
		{
			$mula = substr($start, 0,100) . '...';
		}
		else
		{ 
			$mula = $start;
		}
		
			return $mula;
	
	}
}


// check length string to display in list

if (!function_exists('getsmallLength')) {
	function getsmallLength($start)
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
	
		if(strlen($start) > 50)
		{
			$mula = substr($start, 0,40) . '...';
		}
		else
		{ 
			$mula = $start;
		}
		
			return $mula;
	
	}
}

if (!function_exists('getssmallLength')) {
	function getssmallLength($start)
	{	
		// $data = DB::table('tbl_settings')->where('id','=',$id)->first();
	
		if(strlen($start) > 20)
		{
			$mula = substr($start, 0,20) . '...';
		}
		else
		{ 
			$mula = $start;
		}
		
			return $mula;
	
	}
}


//Get New ID from location table to link with geran file
if (!function_exists('getNewLocationID')) {
	function getNewLocationID()
	{	
		$lokasiID = DB::table('lokasi')->max('id');
		
		if(!empty($lokasiID))
		{
			
			return $lokasiID;
		}
	}
}

//Vehicle Brand  in View of vehicle module



if (!function_exists('getAccessStatusUser')) {
	function getAccessStatusUser()
	{	
		$id = Auth::user()->id;

		$user = DB::table('users')->where('id','=',$id)->first();
		
		$userrole = $user->role;
		
		if($userrole == 'admin')
		{
			return 'yes';
		}

		else
		{
			return 'no';
		}

	}
}


if (!function_exists('getDatepicker')) {
	function getDatepicker()
	{	
		$dateformat=DB::table('users')->first();
		$dateformate= $dateformat->date_format;
		if(!empty($dateformate))
		{
			if($dateformate == 'm-d-Y')
			{
				$dateformats= "mm-dd-yyyy";
				return $dateformats;
			}
			elseif($dateformate == 'Y-m-d')
			{
				$dateformats= "yyyy-mm-dd";
				return $dateformats;
			}
			elseif($dateformate == 'd-m-Y')
			{
				$dateformats= "dd-mm-yyyy";
				return $dateformats;
			}
			elseif($dateformate == 'M-d-Y')
			{
				$dateformats= "MM-dd-yyyy";
				return $dateformats;
			}
			
		}	
	}
}

?>
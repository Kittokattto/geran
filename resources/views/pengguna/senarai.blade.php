@extends('layouts.main')

@section('title')
Senarai Pengguna
@endsection
@section('search')

<form action="{!! url('/pengguna/search')!!}" method="get" class="d-none d-sm-inline-block shadow-sm">
	<div class="input-group">
	<select name="type" class="form-control  bg-light border-right-2 ">
		<option value="" disabled selected hidden>Pilih Jenis Carian...</option>
		<option value="address">Alamat</option>
		<option value="department">Jabatan</option>
		<option value="email">Email</option>
		<option value="name">Nama</option>
		<option value="phone">No Telefon</option>
		<option value="registerBy">Didaftar Oleh</option>
	</select>
	<hr>
	
	<input type="search" name="search" class="form-control bg-light border-0 small" placeholder="Cari Nama Pengguna..."
		aria-label="Search" aria-describedby="basic-addon2">
	
	<div class="input-group-append">
		<button class="btn btn-primary" type="submit">
			<i class="fas fa-search fa-sm"></i>
		</button>
	</div>
</div>
</form>

{{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
	class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
@endsection
@section('content')




@if (getAccessStatusUser()=='yes')
<!-- page content -->
	<div class="right_col" role="main">
        <div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
    <!-- Modal content-->
				<div class="modal-content modal_data">
				</div>
			</div>
        </div>
		
		<!-- Modal for Coupon Data -->
			<div class="modal fade" id="coupaon_data" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content used_coupn_modal_data">
						
					</div>
				</div>
			</div>
		<!-- End Modal for Coupon Data -->
        <div class="">
			@if(session('message'))
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							@if(session('message') == 'Successfully Submitted')
							<label for="checkbox-10 colo_success"> {{trans('Successfully Submitted')}}  </label>
						   @elseif(session('message')=='Successfully Updated')
						   <label for="checkbox-10 colo_success"> {{ trans('app.Successfully Updated')}}  </label>
						   @elseif(session('message')=='Successfully Deleted')
						   <label for="checkbox-10 colo_success"> {{ trans('app.Successfully Deleted')}}  </label>
						   @endif
						</div>
					</div>
				</div>
			@endif
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="card mb-4 py-3 border-bottom-secondry">
						

						<nav class="tab-link" style="margin-left: 8px;">
					
							<a href="{!! url('/pengguna/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Pengguna</b> </a>
							<a href="{!! url('/pengguna/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Pengguna</b></a>

						</nav>
					
					
				</div>
					
					<?php $userid = Auth::user()->id; ?>
					<div style="margin:auto;">{{ $user->links() }}</div>
					
					<div class="table-wrapper">
						
						<table class="fl-table" >
							
							<thead>
								<tr>
									<th>#</th>

									<th>{{ trans('Nama')}}</th>
                                    <th>{{ trans('No Telefon')}}</th>
                                    <th>{{ trans('Email')}}</th>
									<th>{{ trans('Alamat')}}</th> 
									<th>{{ trans('Jabatan')}}</th>
                                    <th>{{ trans('Didaftar Oleh')}}</th>
                                    <th>{{ trans('Tarikh Mendaftar')}}</th> 
									<th>{{ trans('Tindakan')}}</th> 
								</tr>
							</thead>
							<tbody>
                                @if(!empty($user))
								<?php $i=1;?> 
								@foreach($user as $users)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $users->name}}</td>
										<td>{{ $users->phone}}</td>
                                        <td>{{ $users->email}}</td>
                                        <td>{{ $users->address}}</td>
                                        <td>{{ $users->department}}</td>
                                        <td>{{ $users->registerBy}}</td>
                                        <td>{{ $users->created_at}}</td>
										<td>

												<a href="{!! url('/pengguna/show/'.$users->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('View') }}</button></a>
												<a href="{!! url('/pengguna/edit/'.$users->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('Edit') }}</button></a>
												<a url="{!! url('/pengguna/padam/'.$users->id) !!}" class="sa-warning buttonOfAtag"><button type="button" id="threeBtnInOneLine" class="btn btn-round btn-danger ">{{ trans('Delete') }}</button></a>

										</td>
									</tr>
								<?php $i++; ?>
								@endforeach
								@endif
								
							</tbody>
						</table>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>

	@else
	<div class="right_col" role="main">
		<div class="nav_menu main_title" style="margin-top:4px;margin-bottom:15px;">
            <div class="nav toggle" style="padding-bottom:16px;">
				<span class="titleup">&nbsp {{ trans('You are not authorize this page.')}}</span>
            </div>
		</div>
	</div>
	@endif



	
<script>
	document.addEventListener("DOMContentLoaded", function(event) {
	$('body').on('click', '.sa-warning', function() {
	
		var url =$(this).attr('url');
		
		
		 	Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					window.location.href = url;
					Swal.fire(
					'Deleted!',
					'Your imaginary file has been deleted.',
					'success'
					)
				// For more information about handling dismissals please visit
				// https://sweetalert2.github.io/#handling-dismissals
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					Swal.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
					)
				}
				})
	  }); 
  } );

// $('body').on('click', '.sa-warning', function() {
	
// 	var url =$(this).attr('url');
	
	
// 	  swal({   
// 		  title: "Are You Sure?",
// 		  text: "You will not be able to recover this data afterwards!",   
// 		  type: "warning",   
// 		  showCancelButton: true,   
// 		  confirmButtonColor: "#297FCA",   
// 		  confirmButtonText: "Yes, delete!",   
// 		  closeOnConfirm: false 
// 	  }, function(){
// 		  window.location.href = url;
		   
// 	  });
//   }); 
// } );
   
  </script>


@endsection

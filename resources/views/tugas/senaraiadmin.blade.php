@extends('layouts.main')

@section('title')
Senarai Tugasan
@endsection
@section('search')

{{-- <form action="{!! url('/pengguna/search')!!}" method="get" class="d-none d-sm-inline-block shadow-sm">
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
</form> --}}

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
			
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
						<div class="card mb-4 py-3 border-bottom-secondry">
						<nav class="tab-link" style="margin-left: 8px;">
					
							<a href="{!! url('/tugas/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas Selesai</b> </a>
							<a href="{!! url('/tugas/senaraiselesai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas Tidak Selesai</b> </a>
							<a href="{!! url('/tugas/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Tambah Tugas</b> </a>

						</nav>
						</div>
					
					@if(session('message'))
				<div class="row message">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class=" bg-success text-white shadow">
							<div class="row justify-content-center"> {{session('message')}}  </div>
						    
						</div>
					</div>
				</div>
				@endif
					

					{{-- 
					<div style="margin:auto;">{{ $user->links() }}</div> --}}
					
					<div class="table-wrapper">
						
						<table class="fl-table" >
							
							<thead>
								<tr>
									

									<th>{{ trans('Keutamaan')}}</th>
									<th>{{ trans('Nama Kakitangan')}}</th>
                                    <th>{{ trans('Tugasan')}}</th>
                                    <th>{{ trans('Tugasan Oleh')}}</th>
									<th>{{ trans('Tarikh Mula')}}</th> 
									<th>{{ trans('Tarikh Akhir')}}</th> 
									<th>{{ trans('Masa')}}</th>
									<th>{{ trans('Tindakan')}}</th>
								</tr>
							</thead>
							<tbody>
                                @if(!empty($task))
								@foreach($task as $tasks)
									<tr>
										{{-- s --}}
										<td>
											@if($tasks->keutamaan == '1')
											{{ trans('Sangat Penting')}}
											@elseif ($tasks->keutamaan == '2')
											{{ trans('Penting')}}
											@else 
											{{ trans('Tidak Penting')}}
											@endif
										</td>
										<td>{{ $tasks->staff->name}}</td>
										<td>
											{{-- @if (strlen($task->tugas) > 10)
											{{ getLenght($tasks->tugas)}}
											@else
											{{ $task->tugas}}
											@endif --}}
											{{ getLength($tasks->tugas)}}
										</td>
                                        <td>{{ $tasks->tugasBy}}</td>
                                        <td>{{ date('j F Y',strtotime($tasks->created_at))}}</td>
                                        <td>{{ date('j F Y',strtotime($tasks->tarikh))}}</td>
                                        <td>{{ $tasks->masa}}</td>

										<td>

												<a href="{!! url('/tugas/show/'.$tasks->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('Lihat') }}</button></a>
												<a href="{!! url('/tugas/edit/'.$tasks->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('Mengemaskini') }}</button></a>
												<a url="{!! url('/tugas/padam/'.$tasks->id) !!}" class="sa-warning buttonOfAtag"><button type="button" id="threeBtnInOneLine" class="btn btn-round btn-danger ">{{ trans('Padam') }}</button></a>

										</td>
									</tr>
					
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

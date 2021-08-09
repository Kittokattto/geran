@extends('layouts.main')

@section('title')
Senarai Lokasi Fail Kes
@endsection
@section('search')

<form action="{!! url('/failkes/search')!!}"  name="searchForm"   onsubmit="return validateForm()"method="get" class="d-none d-sm-inline-block shadow-sm">
<div class="input-group">
	<select name="type" id class="form-control  bg-light border-right-2 ">
		{{-- <option value="" disabled selected hidden>Pilih Jenis Carian...</option> --}}
		<option value="jenis_file" selected>Jenis Fail</option>
		<option value="tajuk_file">Tajuk Fail</option>
		<option value="status">Status</option>
		<option value="lokasi">Lokasi</option>
		{{-- <option value="created_at">Tarikh Detempatkan</option> --}}
		{{-- <option value="id_user">Ditempatkan Oleh</option> --}}
	</select>

	<hr>
	<input type="search" id="search" name="search"class="form-control bg-light border-0 small" placeholder="Cari Tajuk Fail..."
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
			{{-- @if(session('message'))
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							@if(session('message') == 'Successfully Submitted')
							<label for="checkbox-10 colo_success"> {{trans('Successfully Submitted')}}  </label>
						   @elseif(session('message')=='Successfully Updated')
						   <label for="checkbox-10 colo_success"> {{ trans('Successfully Updated')}}  </label>
						   @elseif(session('message')=='Successfully Deleted')
						   <label for="checkbox-10 colo_success"> {{ trans('Successfully Deleted')}}  </label>
						   @endif
						</div>
					</div>
				</div>
			@endif --}}
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="card mb-4 py-3 border-bottom-secondry">
						

						<nav class="tab-link" style="margin-left: 8px;" >
					
							<a href="{!! url('/lokasi/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Lokasi</b> </a>
							<a href="{!! url('/lokasi/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Lokasi Fail</b></a>

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
					<?php $userid = Auth::user()->id; ?>
					<div style="margin:auto;">{{ $lokasi->links() }}</div>
					
					<div class="table-wrapper">
						
						<table class="fl-table" >
							
							<thead>
								<tr>
									<th>#</th>

									<th>{{ trans('Jenis Fail')}}</th>
									<th>{{ trans('Tajuk Fail')}}</th>
									
                                    <th>{{ trans('Lokasi')}}</th>
									<th>{{ trans('Status')}}</th>
									<th>{{ trans('Jumlah Salinan')}}</th> 
                                    <th>{{ trans('Ditempatkan Oleh')}}</th>
                                    <th>{{ trans('Tarikh Ditempatkan')}}</th> 
									<th>{{ trans('Tindakan')}}</th> 
									
								</tr>
							</thead>
							<tbody>
                                @if(!empty($lokasi))
								<?php $i=1;?> 
								@foreach($lokasi as $lokasis)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $lokasis->jenis_file}}</td>
										<td>{{ $lokasis->tajuk_file}}</td>
										
										<td>{{ $lokasis->lokasi}}</td>
										<td>{{ $lokasis->status}}</td>
                                        <td>{{ $lokasis->copy}}</td>
                                        <td>{{ $lokasis->user->name}}</td>
                                        <td>{{ $lokasis->created_at}}</td>
                                        
										<td>

												<a href="{!! url('/lokasi/show/'.$lokasis->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('View') }}</button></a>
												<a href="{!! url('/lokasi/edit/'.$lokasis->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('Edit') }}</button></a>
												<a url="{!! url('/lokasi/padam/'.$lokasis->id) !!}" class="sa-warning buttonOfAtag"><button type="button" id="threeBtnInOneLine" class="btn btn-round btn-danger ">{{ trans('Delete') }}</button></a>

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
<script>
	function validateForm()
	{
		var x = document.forms["searchForm"]["search"].value;

		if (x == null| x == "")
		{
		
			return false;
		}
	
	}
</script>

@endsection

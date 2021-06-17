@extends('layouts.main')

@section('title')
Senarai Lokasi Fail Kes
@endsection
@section('search')

<form action="{!! url('/failkes/search')!!}" method="get" class="d-none d-sm-inline-block shadow-sm">
<div class="input-group">
	<select name="type" id class="form-control  bg-light border-right-2 ">
		<option value="" disabled selected hidden>Pilih Jenis Carian...</option>
		<option value="jenis_file">Jenis Fail</option>
		<option value="tajuk_file">Tajuk Fail</option>
		<option value="status">Status</option>
		<option value="lokasi">Lokasi</option>
		{{-- <option value="created_at">Tarikh Detempatkan</option> --}}
		<option value="id_user">Ditempatkan Oleh</option>
	</select>

	<hr>
	<input type="search" name="search"class="form-control bg-light border-0 small" placeholder="Cari Tajuk Fail..."
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
						

						<nav class="tab-link" style="margin-left: 8px;" >
					
						

						</nav>
					
					
				</div>
					
					<?php $userid = Auth::user()->id; ?>
					<div style="margin:auto;">{{ $lokasi->links() }}</div>
					
					<div class="table-wrapper">
						
						<table class="fl-table" >
							
							<thead>
								<tr>
									<th>#</th>

									<th>{{ trans('Jenis Fail')}}</th>
									<th>{{ trans('Tajuk Fail')}}</th>
									<th>{{ trans('No Hakmilik')}}</th>
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
										<td>{{ $lokasis->no_hakmilik}}</td>
										<td>{{ $lokasis->lokasi}}</td>
										<td>{{ $lokasis->status}}</td>
                                        <td>{{ $lokasis->copy}}</td>
                                        <td>{{ $lokasis->user->name}}</td>
                                        <td>{{ $lokasis->created_at}}</td>
                                        
										<td>

												<a href="{!! url('/lokasi/show/'.$lokasis->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('View') }}</button></a>
												<a href="{!! url('/lokasi/restore/'.$lokasis->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('Kembalikan') }}</button></a>
												<a url="{!! url('/lokasi/destroy/'.$lokasis->id) !!}" class="sa-warning buttonOfAtag"><button type="button" id="threeBtnInOneLine" class="btn btn-round btn-danger ">{{ trans('Delete') }}</button></a>

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
					'Your file has been deleted..',
					'success'
					)
				// For more information about handling dismissals please visit
				// https://sweetalert2.github.io/#handling-dismissals
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					Swal.fire(
					'Cancelled',
					'Your file is safe here :)',
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

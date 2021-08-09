@extends('layouts.main')

@section('title')
Senarai Geran
@endsection
@section('search')

<form action="{!! url('/failkes/search')!!}" name="searchForm"   onsubmit="return validateForm()" method="get" class="d-none d-sm-inline-block shadow-sm">
	<div class="input-group">
		<select name="type" class="form-control  bg-light border-right-2 ">
			
			<option value="no_hakmilik" selected>No. Hakmilik</option>
			<option value="tajuk_geran">Jenis Hakmilik</option>
			<option value="daerah">Daerah</option>
			<option value="no_lot">No. Lot</option>
			<option value="no_fail">No. Fail</option>
			<option value="pemilik">Pemilik</option>
		</select>
		<hr>
		<input type="search" id="search" name="search" class="form-control bg-light border-0 small" placeholder="Cari No Hakmilik"
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
						

							<nav class="tab-link" >
						

								
							</nav>
						
						
					</div>
					<?php $userid = Auth::user()->id; ?>
					<div style="margin:auto;">{{ $geran->links() }}</div>
					<div class="table-wrapper">
						<table class="fl-table" >
							<thead>
								<tr>
									<th>#</th>

									<th>{{ trans('No. Hakmilik')}}</th>
									<th>{{ trans('Jenis Hakmilik')}}</th>
									<th>{{ trans('Pemilik')}}</th>
                                    <th>{{ trans('Bandar/Pekan/Mukim')}}</th>
                                    
									<th>{{ trans('No.Lot')}}</th> 
                                    <th>{{ trans('No.Fail')}}</th>
									<th>{{ trans('Diurus Oleh')}}</th>
								</tr>
							</thead>
							<tbody>
                                @if(!empty($geran))
								<?php $i=1;?> 
								@foreach($geran as $gerans)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $gerans->no_hakmilik}}</td>
										<td>{{ $gerans->tajuk_geran}}</td>
                                        <td>{{ $gerans->pemilik}}</td>
                                        <td>{{ $gerans->daerah}}</td>
                                        
                                        <td>{{ $gerans->no_lot}}</td>
										<td>{{ $gerans->no_fail}}</td>
                                        <td>{{ $gerans->registerby->name}}</td>

										<td>

												<a href="{!! url('/failkes/show/'.$gerans->geran_id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('View') }}</button></a>
												<a href="{!! url('/failkes/restore/'.$gerans->geran_id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('Kembalikan') }}</button></a>
												<a url="{!! url('/failkes/destroy/'.$gerans->geran_id) !!}" class="sa-warning buttonOfAtag"><button type="button" id="threeBtnInOneLine" class="btn btn-round btn-danger ">{{ trans('Delete') }}</button></a>

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
					'Your file has been deleted.',
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

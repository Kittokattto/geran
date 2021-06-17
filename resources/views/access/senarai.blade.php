@extends('layouts.main')

@section('title')
Senarai Pengguna
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
						

						<nav class="tab-link" >
					
							<a href="{!! url('/access/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Akses</b> </a>


						</nav>
					
					
				</div>
					
					<?php $userid = Auth::user()->id; ?>
					<div style="margin:auto;">{{ $access->links() }}</div>
					
					<div class="table-wrapper">
						
						<table class="fl-table" >
							
							<thead>
								<tr>
									<th>#</th>

									<th>{{ trans('Akses Status')}}</th>
                                    <th>{{ trans('No Hakmilik')}}</th>
                                    <th>{{ trans('No Fail')}}</th>
                                    <th>{{ trans('Tajuk Fail')}}</th>
									<th>{{ trans('Pemilik')}}</th> 
                                    <th>{{ trans('Diakses Oleh')}}</th>
                                    <th>{{ trans('Jabatan')}}</th>
                                    <th>{{ trans('Timestamp')}}</th> 
									{{-- <th>{{ trans('Tindakan')}}</th>  --}}
								</tr>
							</thead>
							<tbody>
                                @if(!empty($access))
								<?php $i=1;?> 
								@foreach($access as $accesss)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $accesss->status}}</td>
										<td>{{ $accesss->file->no_hakmilik}}</td>
                                        <td>{{ $accesss->file->no_fail}}</td>
                                        <td>{{ $accesss->file->tajuk_geran}}</td>
                                        <td>{{ $accesss->file->pemilik}}</td>
                                        <td>{{ $accesss->user->name}}</td>
                                        <td>{{ $accesss->user->department}}</td>
                                        <td>{{ $accesss->created_at}}</td>
										{{-- <td>

												{{-- <a href="{!! url('/pengguna/show/'.$accesss->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('View') }}</button></a>
												<a href="{!! url('/pengguna/edit/'.$users->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('Edit') }}</button></a>
												<a url="{!! url('/pengguna/padam/'.$users->id) !!}" class="sa-warning buttonOfAtag"><button type="button" id="threeBtnInOneLine" class="btn btn-round btn-danger ">{{ trans('Delete') }}</button></a> 

										</td> --}}
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

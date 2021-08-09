@extends('layouts.main')

@section('title')
Senarai Tugasan
@endsection
@section('search')



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
							<label for="checkbox-10 colo_success" class="bg-success text-white shadow"> {{trans('Successfully Submitted')}}  </label>
						   @elseif(session('message')=='Successfully Updated')
						   <label for="checkbox-10 colo_success" class="bg-success text-white shadow"> {{ trans('Successfully Updated')}}  </label>
						   @elseif(session('message')=='Successfully Deleted')
						   <label for="checkbox-10 colo_success" class="bg-success text-white shadow"> {{ trans('Successfully Deleted')}}  </label>
						   @endif
						</div>
					</div>
				</div>
			@endif --}}
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="card mb-4 py-3 border-bottom-secondry">
						

						<nav class="tab-link" style="margin-left: 8px;" >
					
							<a href="{!! url('/tugas/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas</b> </a>
							<a href="{!! url('/tugas/senaraiselesai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Senarai Tugas Selesai</b></a>
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
					<div class="container page-todo bootstrap snippets bootdeys">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="task-list">
								<h1>Tasks</h1>
								<div class="card shadow mb-4">
								<div class="priority high"><span>high priority</span></div>

								@if(!empty($high))
								@foreach ($high as $highs)
								<a href="{!! url('/tugas/show/'.$highs->id) !!}">
								<div class="task high">
									<div class="desc">
										<div class="title">{{$highs->title}}</div>
										<div>
											
											{{getLength($highs->tugas)}}
										</div>
									</div>
									<div class="time">
										<div class="date">{{ date('j F Y',strtotime($highs->tarikh))}}</div>
										<div> 1 day</div>
									</div>
								</div>	
								</a>
								@endforeach							
								@endif

								
								<div class="priority medium"><span>medium priority</span></div>
								
								@if(!empty($medium))
								@foreach ($medium as $mediums)
								<a href="{!! url('/tugas/show/'.$mediums->id) !!}">
								<div class="task medium">
									<div class="desc">
										<div class="title">{{$mediums->title}}</div>
										<div>{{$mediums->tugas}}</div>
									</div>
									<div class="time">
										<div class="date">{{ date('j F Y',strtotime($mediums->tarikh))}}</div>
										<div> 1 day</div>
									</div>
								</div>
								</a>
								@endforeach
								@endif
						
								<div class="priority low"><span>low priority</span></div>
								
								@if(!empty($low))
								@foreach ($low as $lows)
								<a href="{!! url('/tugas/show/'.$lows->id) !!}">
								<div class="task low">
									<div class="desc">
										<div class="title">{{$lows->title}}</div>
										<div>{{$lows->tugas}}</div>
									</div>
									<div class="time">
										<div class="date">{{ date('j F Y',strtotime($lows->tarikh))}}</div>
										<div> 1 day</div>
									</div>
								</div>
								</a>
								@endforeach
								@endif

								{{-- @if(!empty($low))
								@foreach ($low as $lows)

								<div class="task low">
									<div class="desc">
										<div class="title">{{ $lows->title}}</div>
										<div>{{ $lows->tugas}}</div>
									</div>
									<div class="time">
										<div class="date">{{ date('j F Y',strtotime($lows->tarikh))}}</div>
										<div> 1 day</div>
									</div>
								</div>
								@endforeach
								@endif --}}

								<div class="clearfix"></div>		
							</div>
							</div>		
						</div>
						</div>
					
				</div>
			</div>
		</div>
	</div>

	{{-- @else
	<div class="right_col" role="main">
		<div class="nav_menu main_title" style="margin-top:4px;margin-bottom:15px;">
            <div class="nav toggle" style="padding-bottom:16px;">
				<span class="titleup">&nbsp {{ trans('You are not authorize this page.')}}</span>
            </div>
		</div>
	</div>
	@endif --}}



	
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

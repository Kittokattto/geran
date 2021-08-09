@extends('layouts.main')

@section('title')
Tugasan
@endsection
@section('content')


<style>
    .theTooltip {
            position: absolute!important;
    -webkit-transform-style: preserve-3d; transform-style: preserve-3d; -webkit-transform: translate(15%, -50%); transform: translate(15%, -50%);
    }
    </style>


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
        


                    <div class="card mb-4 py-3 border-bottom-secondry">
                        <nav class="tab-link" style="margin-left: 8px;" >
                    
                            <a href="{!! url('/tugas/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas</b> </a>   
							<a href="{!! url('/tugas/senaraiselesai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas Selesai</b> </a>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b> Tugas</b></a>
                            
                        </nav>                    
                    </div>
                    
            <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Maklumat Tugasan</h6>
                                    </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-10 col-sm-10 col-xs-10 form-group">
                                    
                                        <label class="control-label col-sm-4" for="first-name">{{ trans('Nama Kakitangan') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $task->staff->name }} </label><br><br>
                                        <label class="control-label col-sm-4" for="first-name">{{ trans('Tugasan') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $task->tugas }} </label><br><br><br>
                                        <label class="control-label col-md-4" for="first-name">{{ trans('Keutamaan') }}  </label> : <label class="control-label col-sm-6" for="first-name">
                                           
                                            
                                             @if($task->keutamaan == '1')
											    
                                                <div class=" bg-danger text-white shadow">

                                                    <div class="row justify-content-center">{{ trans('Sangat Penting')}}
                                                 </div>
                                                 </div>
											@elseif ($task->keutamaan == '2')
								
                                            <div class="bg-warning text-white shadow">

                                                <div class="row justify-content-center">{{ trans('Penting')}}
                                             </div>
                                             </div>
											@else 
										
                                            <div class="bg-success text-white shadow">

                                                <div class="row justify-content-center">{{ trans('Tidak Penting')}}
                                             </div>
                                             </div>
											@endif
                                        </label><br>
                                        
                                        <label class="control-label col-md-4" for="first-name">{{ trans('Tugasan Oleh') }}</label> : <label class="control-label col-sm-6" for="first-name">{{ $task->tugasBy }} </label><br>
                                        <label class="control-label col-md-4" for="first-name">{{ trans('Tarikh Mula') }}</label> : <label class="control-label col-sm-6 " for="first-name">{{ date('j F Y',strtotime($task->created_at))}} </label><br>
                                        <label class="control-label col-md-4" for="first-name">{{ trans('Tarikh Akhir') }}</label> : <label class="control-label col-sm-6 " for="first-name">{{ date('j F Y',strtotime($task->tarikh))}} </label><br>
                                        <label class="control-label col-sm-4" for="first-name">{{ trans('Masa') }} </label>  : 
                                        <label class="control-label col-sm-6" for="first-name">
                                            @if (!empty($lambat))
                                            <label class="text-danger">*{{$lambat}} {{$days}} </label>
                                            @else
                                            {{$days}}
                                            @endif
                                        </label><br>
                                                
                                        
                                        
                                            
                                       
                                    @if ( $task->status == 3)
                                            
                                            <label class="control-label col-sm-4" for="first-name">{{ trans('Status') }} </label> : <label class="control-label col-sm-6" for="first-name">
                                            <a href=""  style="margin-right: 8px;">
                                            <input  id="status" name="status"  type="checkbox" value="3" checked disabled 
                                             data-width="160" data-height="30"  
                                             data-toggle="toggle"  data-onstyle="success"  
                                             data-on="<i class='fa fa-check-circle'>
                                            </i> Selesai" data-off="<i class='fa fa-times-circle'></i>Belum Selesai">
                                            </a>
                                            </label><br><br>
                                            <label class="control-label col-sm-4" for="first-name">{{ trans('Komen') }} </label>  : <label class="control-label col-sm-6" for="first-name">{{ $task->comment}}</label><br>
                                            <label class="control-label col-sm-4" for="first-name">{{ trans('Fail') }} </label>  : <label class="control-label col-sm-6" for="first-name"><a target="_blank" href="{{url($task->gambar)}}" ><i class="fa fa-file" aria-hidden="true"></i>{{$task->nama_gambar}}</a></label><br>
                                    @else
                                            <form name="form-status"  action="update/{{ $task->id }}" onsubmit="return validateForm()" on enctype="multipart/form-data" method="post">
                                                @csrf
                                            <label class="control-label col-sm-4" for="first-name">{{ trans('Status') }} </label> : <label class="control-label col-sm-6" for="first-name">
                                            <a href=""  style="margin-right: 8px;">
                                                <input name="status"  id="status" onclick="return validateForm()"  type="checkbox" value="3"  
                                                 data-width="160" data-height="30"  
                                                 data-toggle="toggle"  data-onstyle="success"  
                                                 data-on="<i class='fa fa-check-circle'>
                                                </i> Selesai" data-off="<i class='fa fa-times-circle'></i>Belum Selesai">
                                                </a>
                                            </label><br><br>
                                            <label class="control-label col-sm-4" for="first-name">{{ trans('Komen') }} </label>  : <label class="control-label col-sm-6" for="first-name">
                                                <textarea  id="komen" name="komen" placeholder="{{ trans('Komen')}}" value="{{ old('komen') }}" class="form-control"></textarea> 
                                            </label><br>
                                
                                        <label class="control-label col-sm-4" for="first-name"><span name="custom" id="custom" class="btn btn-primary">
                                            <input class="btn btn-primary" id="file" hidden type="file"  name="file" value="{{ old('file') }}" hidden/> 
                                                <i class="fa fa-upload" aria-hidden="true">Muat Naik Fail</i>
                                        </span> </label>  : <label class="control-label col-sm-6" for="first-name"><span id="custom-span">Pilih Fail</span></label><br>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                                    <a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('Cancel')}}</a>
                                                    <button type="submit" class="btn btn-success customerAddSubmitButton">{{ trans('Submit')}}</button>
                                                </div>
                                            </div>
                                            
                                        </form> 
                                    @endif
                                        
                                        @if(!empty($task->comment))
                                        
                                        @else
                                        
                                       
                                        @endif
                                        
                                        



                                </div>
                            </div>
                        </div>
                        </div>
                        
                        </div>

                        
                    </div>
                </div>
            </div>
            </div>
            </div>

<script>
    
</script>
<script>
    const realFileBtn = document.getElementById("file");
    const custom = document.getElementById("custom");
    const customTxt = document.getElementById("custom-span");

    custom.addEventListener("click", function(){
            realFileBtn.click();
    });

    realFileBtn.addEventListener ("change", function(){
        if (realFileBtn.value)
        {
            customTxt.innerHTML = realFileBtn.value.match(/([\w\d\s\.\-\(\)]+)$/)[1];
        }
        else{
            customTxt.innerHTML = "No Choose File";
        }
    });
</script>
<script>
	function validateForm()
	{
		// var x = document.getElementById("status").checked;
        var y = document.getElementById("status");
        
		if ( y.checked == false|| y == null )
		{
            
			return false;
		}

       
	
	}
</script>

{{-- <script>
    $(document).ready(function(){
    $("form").submit(function(e) {
    e.preventDefault();
    if ($(this).find('input[name="status"]').checked === false || document.getElementById('status') == null ||  document.getElementById('status') == "") {
      alert("Tekan Butang Selesai Untuk Hantar Status");
      return false;
    }
    });
});
</script> --}}



@endsection

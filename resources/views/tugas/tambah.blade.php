@extends('layouts.main')

@section('title')
Tambah Tugas
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
                        <nav class="tab-link"  style="margin-left: 8px;" >
                    
                            <a href="{!! url('/tugas/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas</b> </a>
                            <a href="{!! url('/tugas/senaraiselesai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Tugas Tidak Selesai</b> </a>
                            <a href="{!! url('/tugas/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Tugas</b></a>
                           
                        </nav>                    
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                @if (session('error'))
							<div class="alert alert-danger"><span class="fa fa-times"></span><em> {{ session('error') }} </em></div>
						@endif
                                <form id="demo-form2" action="{!! url('/tugas/store')!!}" method="post"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left input_mask customerAddForm">
                                         @csrf
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Tugasan</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="title">{{ trans('Tajuk') }} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        
                                                            <input type="text" id="title" name="title" placeholder="{{ trans('Tajuk')}}" value="{{ old('title') }}" class="form-control" maxlength="25" >
                                                            @if ($errors->has('title'))
                                                            <span class="help-block text-danger" >
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                            </span>
                                                            @endif
                                                    </div>
                                                </div>
               
                                               
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Keutamaan') }} <label class="text-danger">*</label> </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select name="priority" id="priority" class="form-control" placeholder="" value="{{ old('priority') }}"  autocomplete="negeri"   >
                                                            <option value="" disabled selected hidden >Keutamaan</option>
                                                            <option value="1" style="color: rgb(255, 37, 9);" >High</option>
                                                            <option value="2" style="color: rgb(255, 255, 0);">Medium</option>
                                                            <option value="3" style="color: rgb(20, 247, 93);"">Low</option>
                                                            
                                                          </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tajuk">{{ trans('Nama Staf') }} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select name="staf" id="staf"  class="form-control" value="{{ old('staff') }}"  autocomplete="tajuk" >
                                                            <option value="" disabled selected hidden>Staff</option>
                                                            @foreach ($user as $user)
                                                            
												            <option value="{{ $user->id }}" >{{$user->name }}</option>
											                @endforeach
                                                            
                                                        </select>
                                                        @if ($errors->has('tajuk'))
                                                            <span class="help-block text-danger" >
                                                                <strong>{{ $errors->first('tajuk') }}</strong>
                                                            </span>
                                                    @endif
                                                    </div>
                                                </div>
            
                                            </div>   
            
                                            <div class="row">
                                             
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tugasan')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                                        <textarea  name="tugas" rows="10" cols="40" placeholder="{{ trans('Tugasan')}}" value="{{ old('tugas') }}" class="form-control"  ></textarea>
                                                        @if ($errors->has('tugas'))
                                                        <span class="help-block text-danger" >
                                                            <strong>{{ $errors->first('tugas') }}</strong>
                                                        </span>
                                                        @endif
                                                        {{-- @error('pemilik')
                                                            <span class="invalid-feedback text-danger" role="alert" >
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror --}}
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Akhir')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="date" id="tarikh" name="tarikh" placeholder="{{ trans('Tarikh hantar')}}" value="{{ old('tarikh') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('tarikh'))
                                                    <span class="help-block text-danger" >
                                                        <strong>{{ $errors->first('tarikh') }}</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div>

                                            {{-- <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Masa')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="time" id="time" min="10:00" max="18:00"  data-format="HH:mm" data-template="HH:mm" name="time" value="{{ old('time') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('time'))
                                                    <span class="help-block text-danger" >
                                                        <strong>{{ $errors->first('time') }}</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div> --}}

                                        </div>
                                            {{-- <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <div class="form-check">
                                                
                                                <div class="col-md-8 col-sm-8 col-xs-12 gender">
                                                    <input type="checkbox" id="rizab"  name="rizab" value="1" class="form-check-input" value="{{ old('rizab') }}">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12"> {{ trans('Rizab Melayu')}}</label>
                                                </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div id="check"  style="display: none;">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Pemberitahuan Warta')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" id="warta"  name="warta" placeholder="{{ trans('')}}" value="{{ old('warta') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('warta'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('warta') }}</strong>
                                                    </span>
                                                    @endif --}}
                                                    {{-- @error('warta')
                                                            <span class="invalid-feedback text-danger" role="alert" >
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror --}}
                                                {{-- </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Pemberitahuan Warta')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="date" id="tarikh_warta" name="tarikh_warta" placeholder="{{ trans('')}}" value="{{ old('tarikh_warta') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('tarikh_warta'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('tarikh_warta') }}</strong>
                                                    </span>
                                                    @endif

                                                </div>
                                            </div>
                                            </div> --}}
                                


                                </div>
                                
                                
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('Cancel')}}</a>
                                            <button type="submit" class="btn btn-success customerAddSubmitButton">{{ trans('Submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
				</div>



{{-- <script>
    document.addEventListener("DOMContentLoaded", function(event) {


                $('#tajuk').change(function(){

                var x = document.getElementById("tajuk").value;
                
                if ( x == "Hakmilik Sementara Daerah" || x == "Hakmilik Sementara Mukim" )
                {
                    document.getElementById("haksementara").style.display = "block";
                    document.getElementById("haksementaraa").style.display = "block";
                    //   document.getElementById("haksementara3").style.display = "block";
                }
                else{
                document.getElementById("haksementara").style.display = "none";
                //   document.getElementById("haksementara3").style.display = "none";
                document.getElementById("haksementaraa").style.display = "none";
                
                }
             });

             $('#rizab').change(function(){

                var checkBox = document.getElementById("rizab");
                    var text = document.getElementById("check");
                    if (checkBox.checked == true){
                        text.style.display = "block";
                        document.getElementById("warta").required =true;
                        document.getElementById("tarikh_warta").required = true;
                    } else {
                        text.style.display = "none";
                     }
            });


    });

    
</script>


<script> 
document.addEventListener("DOMContentLoaded", function(event) {

    $('#staf').change(function(){

        var id_user = $('#staf').val();
        $.ajax({
			type:'GET',
			url: "{!! url('/tugas/getTask') !!}",
			data:{ id_user : id_user },
			dataType: 'json',
			beforeSend: function() {
				/* do nothing */
			},
			success:function(response){

				
			},

			}
		});
    });

});
    
    </script> --}}



@endsection

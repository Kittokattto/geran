@extends('layouts.main')

@section('title')
Tambah Fail Kes
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
                    
                            <a href="{!! url('/lokasi/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Lokasi</b> </a>
							<a href="{!! url('/lokasi/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Lokasi Fail</b></a>
                           
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
                                <form id="demo-form2" action="{!! url('/lokasi/store')!!}" method="post" 
                                enctype="multipart/form-data" data-parsley-validate 
                                         class="form-horizontal form-label-left input_mask customerAddForm">
                                         @csrf
                                         <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Maklumat Lokasi Fail</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                 
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tajuk">{{ trans('Tajuk Fail') }} <label class="text-danger">*</label> </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="tajuk" name="tajuk"  class="form-control " value="{{ old('tajuk') }}" maxlength="25"    />
                                                          @if ($errors->has('tajuk'))
                                                           <span class="help-block text-danger">
                                                               <strong>{{ $errors->first('tajuk') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>
                  
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Jenis Fail') }} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="jenis" name="jenis"  class="form-control "  value="{{ old('jenis') }}"  maxlength="50"  />

                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="row">
                                                 
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Lokasi Fail')}} <label class="text-danger">*</label></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="lokasi" value="{{ old('lokasi') }}" class="form-control" maxlength="55" >
                                                            @if ($errors->has('lokasi'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('lokasi') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Status Fail')}}  <label class="text-danger">*</label> </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="status" placeholder="{{ trans('')}}" value="{{ old('status') }}" class="form-control" maxlength="25"  >
                                                            @if ($errors->has('status'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('status') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Jumlah Salinan')}} <label class="text-danger">*</label></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="copy" placeholder="{{ trans('')}}" value="{{ old('copy') }}" class="form-control" maxlength="25" >
                                                            @if ($errors->has('copy'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('copy') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback   ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Disimpan')}}  <label class="text-danger">*</label>  </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="date"  name="date" placeholder="{{ trans('')}}" value="{{ old('date') }}" class="form-control" maxlength="25" >
                                                            @if ($errors->has('date'))
                                                            <span class="help-block text-danger" autofocus>
                                                                <strong>{{ $errors->first('date') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
            

                                                </div>
            
                                            </div>
                                        </div>


                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Maklumat Ringkas Fail</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                 
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback  ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('No. Hakmilik Fail') }} <label class="text-danger">*</label>  </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="no_hakmilik" name="no_hakmilik" placeholder="{{ trans('No. Hakmilik')}}"  class="form-control"  value="{{ old('no_hakmilik') }}"  maxlength="25"  />
                                                          @if ($errors->has('no_hakmilik'))
                                                           <span class="help-block text-danger">
                                                               <strong>{{ $errors->first('no_hakmilik') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('No K/P Pemilik') }}</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="ic" name="ic"  placeholder="{{ trans('cth:890302-01-****')}}" class="form-control" value="{{ old('ic') }}" />
                                                          @if ($errors->has('ic'))
                                                           <span class="help-block text-danger">
                                                               <strong>{{ $errors->first('ic') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback  ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Negeri')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="negeri" placeholder="{{ trans('Negeri')}}" value="{{ old('negeri') }}" class="form-control" maxlength="25">
                                                            @if ($errors->has('negeri'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('negeri') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Daerah')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="daerah" placeholder="{{ trans('Daerah')}}" value="{{ old('daerah') }}" class="form-control" maxlength="25">
                                                            @if ($errors->has('daerah'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('daerah') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Lot Tanah')}}</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="lot" placeholder="{{ trans('No. Lot')}}" value="{{ old('lot') }}" class="form-control" maxlength="" >
                                                            @if ($errors->has('lot'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('lot') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
            

                                                </div>
        
                                                <div class="row">  

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Lembaran Piawai')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="no_lembaran" placeholder="{{ trans('No. Lembaran Piawai')}}" value="{{ old('no_lembaran') }}" class="form-control" maxlength="25" >
                                                            @if ($errors->has('no_lembaran'))
                                                            <span class="help-block text-danger" autofocus>
                                                                <strong>{{ $errors->first('no_lembaran') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Fail')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="no_fail" placeholder="{{ trans('No. Fail')}}" value="{{ old('no_fail') }}" class="form-control" maxlength="105" >
                                                            @if ($errors->has('no_fail'))
                                                            <span class="help-block text-danger">
                                                                <strong>{{ $errors->first('no_fail') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
          
                                                </div>       
                                            </div>
                                        </div>
                                   

                                
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('Cancel')}}</a>
                                            <button type="submit" class="btn btn-success customerAddSubmitButton">{{ trans('Continue')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
				</div>






@endsection

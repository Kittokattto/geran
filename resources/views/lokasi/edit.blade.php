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
                        <nav class="tab-link" >
                    
                            <a href="{!! url('/lokasi/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Lokasi</b> </a>
							<a href="{!! url('/lokasi/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Lokasi Fail</b></a>
                            <a href="{!! url('/failkes/edit/'.$lokasi->id)!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Mengemaskini Lokasi Fail</b></a>
                        </nav>                    
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <form id="demo-form2" action="update/{{ $lokasi->id }}" method="post" 
                                enctype="multipart/form-data" data-parsley-validate 
                                         class="form-horizontal form-label-left input_mask customerAddForm">
                                         @csrf
                                         <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Maklumat Lokasi Fail</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                 
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('tajuk') ? ' has-error' : '' }}">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Tajuk Fail') }} <label class="text-danger">*</label> </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="tajuk" name="tajuk" placeholder="{{ $lokasi->tajuk_file }}"  class="form-control validate[required]" value="{{ $lokasi->tajuk_file }}" maxlength="25"  required  />
                                                          @if ($errors->has('tajuk'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('tajuk') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>
                  
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('jenis') ? ' has-error' : '' }}">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Jenis Fail') }} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="jenis" name="jenis"   class="form-control "  placeholder="{{ $lokasi->jenis_file }}" value="{{ $lokasi->jenis_file }}"  maxlength="25"  />
                                                          @if ($errors->has('jenis'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('jenis') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="row">
                                                 
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('lokasi') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Lokasi Fail')}} <label class="text-danger">*</label></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="lokasi"  placeholder="{{ $lokasi->lokasi }}" value="{{ $lokasi->lokasi }}" class="form-control" maxlength="25" required>
                                                            @if ($errors->has('lokasi'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('lokasi') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('kod') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Kod Fail')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="kod" placeholder="{{ $lokasi->kod}}" value="{{ $lokasi->kod }}" class="form-control" maxlength="150" >
                                                            @if ($errors->has('kod'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('kod') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('copy') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Jumlah Salinan')}} <label class="text-danger">*</label></label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="copy" placeholder="{{ $lokasi->copy}}" value="{{ $lokasi->copy }}" class="form-control" maxlength="25" required>
                                                            @if ($errors->has('copy'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('copy') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('status') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Status Fail')}}  <label class="text-danger">*</label> </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="status" placeholder="{{ $lokasi->status}}" value="{{ $lokasi->status }}" class="form-control" maxlength="25" required >
                                                            @if ($errors->has('status'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('status') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('date') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Disimpan')}}  <label class="text-danger">*</label>  </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="date"  name="date" placeholder="{{ $lokasi->date_locate }}" value="{{ $lokasi->date_locate }}" class="form-control" maxlength="25" required>
                                                            @if ($errors->has('date'))
                                                            <span class="help-block">
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
                                                <div class="text-black-50 small">Tidak Wajib</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                 
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('pemilik') ? ' has-error' : '' }}">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Nama Pemilik') }}</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="pemilik" name="pemilik"  class="form-control"  placeholder="{{ $lokasi->pemilik }}" value="{{ $lokasi->pemilik }}" maxlength="25" />
                                                          @if ($errors->has('pemilik'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('pemilik') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>
                  
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_hakmilik') ? ' has-error' : '' }}">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('No. Hakmilik Fail') }}  </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <input type="text" id="no_hakmilik" name="no_hakmilik"  class="form-control "  placeholder="{{ $lokasi->no_hakmilik }}"  value="{{ $lokasi->no_hakmilik }}"  maxlength="25"  />
                                                          @if ($errors->has('no_hakmilik'))
                                                           <span class="help-block">
                                                               <strong>{{ $errors->first('no_hakmilik') }}</strong>
                                                           </span>
                                                         @endif
                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('negeri') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Negeri')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="negeri" placeholder="{{ $lokasi->negeri}}" value="{{ $lokasi->negeri }}" class="form-control" maxlength="25">
                                                            @if ($errors->has('negeri'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('negeri') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('daerah') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Daerah')}} </label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="daerah" value="{{ $lokasi->daerah }}"  placeholder="{{ $lokasi->daerah }}" class="form-control" maxlength="25">
                                                            @if ($errors->has('daerah'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('daerah') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('lot') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Lot Tanah')}}</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="lot" placeholder="{{ $lokasi->no_lot }}" value="{{ $lokasi->no_lot }}" class="form-control" maxlength="150" >
                                                            @if ($errors->has('lot'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('lot') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
            
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('tempat') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tempat')}}</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input type="text"  name="tempat" placeholder="{{ $lokasi->tempat }}" value="{{ $lokasi->tempat }}" class="form-control" maxlength="25" >
                                                            @if ($errors->has('tempat'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tempat') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
                                                </div>
        
                                                <div class="row">  
                                                    <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback {{ $errors->has('info') ? ' has-error' : '' }} ">
                                                        <label class="control-label col-md-9 col-sm-9 col-xs-12" for="display-name">{{ trans('Info Fail')}} </label>
                                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                                            <textarea rows="10" cols="50" name="info" placeholder="{{ $lokasi->info }}" value="{{ $lokasi->info}}" class="form-control" maxlength="200" ></textarea>
                                                            @if ($errors->has('info'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('info') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
          
                                                </div>       
                                            </div>
                                        </div>
                                   

                                
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('Batal')}}</a>
                                            <button type="submit" class="btn btn-success customerAddSubmitButton">{{ trans('Mengemaskini')}}</button>
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

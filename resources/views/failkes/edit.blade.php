@extends('layouts.main')

@section('title')
Mengemaskini Fail Kes
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
                    
                            <a href="{!! url('/failkes/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Nama Fail Kes</b> </a>
                            <a href="{!! url('/failkes/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah fail kes</b></a>
                            <a href="{!! url('/failkes/edit/'.$geran->geran_id)!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Mengemaskini fail kes</b></a>
                           
                        </nav>                    
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <form id="demo-form2" action="update/{{ $geran->geran_id }}" method="post" 
                                enctype="multipart/form-data" data-parsley-validate 
                                         class="form-horizontal form-label-left input_mask customerAddForm">
                                         @csrf
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Geran</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('tajuk') ? ' has-error' : '' }}">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">{{ trans('Jenis Geran') }} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select name="tajuk" id="tajuk" onchange="myFunction()" class="form-control @error('tajuk') is-invalid @enderror" aria-placeholder="{{ $geran->tajuk_geran }}" required autocomplete="tajuk" autofocus>
                                                            <option value="" disabled selected hidden>Pilih Jenis Geran</option>
                                                            <option value="Geran"<?php if($geran->tajuk_geran == 'Geran'){ echo "selected"; }?>>Geran</option>
                                                            <option value="Geran Mukim"<?php if($geran->tajuk_geran == 'Geran Mukim'){ echo "selected"; }?>>Geran Mukim</option>
                                                            <option value="Pajakan"<?php if($geran->tajuk_geran == 'Pajakan'){ echo "selected"; }?>>Pajakan</option>
                                                            <option value="Pajakan Mukim"<?php if($geran->tajuk_geran == 'Pajakan Mukim'){ echo "selected"; }?>>Pajakan Mukim</option>
                                                            <option value="Hakmilik Sementara Daerah"<?php if($geran->tajuk_geran == 'Hakmilik Sementara Daerah'){ echo "selected"; }?>>Hakmilik Sementara Daerah</option>
                                                            <option value="Hakmilik Sementara Mukim"<?php if($geran->tajuk_geran == 'Hakmilik Sementara Mukim'){ echo "selected"; }?>>Hakmilik Sementara Mukim</option>
            
                                                          </select>
                                                        @error('role')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
               
                                               
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_hakmilik') ? ' has-error' : '' }}">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('No. Hakmilik') }} <label class="text-danger">*</label> </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                      <input type="text" id="no_hakmilik" name="no_hakmilik"  class="form-control validate[required]"  
                                                      value="{{ $geran->no_hakmilik }}" placeholder="{{ $geran->no_hakmilik }}" maxlength="25"  required  />
                                                      @if ($errors->has('no_hakmilik'))
                                                       <span class="help-block">
                                                           <strong>{{ $errors->first('no_hakmilik') }}</strong>
                                                       </span>
                                                     @endif
                                                    </div>
                                                </div>
                                            </div>    
            
                                            <div class="row">
                                             
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Cukai Tahunan')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <label class="control-label ">RM :  </label><label class="control-label"><input type="text"  name="cukai" placeholder="{{$geran->cukai}}" value="{{ $geran->cukai }}" class="form-control"></label>
                                                        @if ($errors->has('cukai'))
                                                        <span class="help-block text-danger" autofocus>
                                                            <strong>{{ $errors->first('cukai') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            
                                            </div>

                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"> {{ trans('Rizab Melayu')}}</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12 gender">
                                                    <input type="checkbox" <?php if($geran->rizab == '1'){ echo "checked"; }?> name="rizab" value="1" >{{ trans('')}}
                                                </div>
                                            </div>
                                        
                                


                                </div>
                                </div>

                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Maklumat Geran</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                             
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('negeri') ? ' has-error' : '' }}">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Negeri') }} <label class="text-danger">*</label> </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select name="negeri" id="negeri" class="form-control @error('negeri') is-invalid @enderror" aria-placeholder="{{ $geran->negeri }}" required autocomplete="negeri" autofocus>
                                                            <option value="" disabled selected hidden>Pilih Negeri</option>
                                                            <option value="Johor"<?php if($geran->negeri == 'Johor'){ echo "selected"; }?>>Johor</option>
                                                            <option value="Kedah"<?php if($geran->negeri == 'Kedah'){ echo "selected"; }?>>Kedah</option>
                                                            <option value="Kelantan"<?php if($geran->negeri == 'Kelantan'){ echo "selected"; }?>>Kelantan</option>
                                                            <option value="Negeri Sembilan"<?php if($geran->negeri == 'Negeri Sembilan'){ echo "selected"; }?>>Negeri Sembilan</option>
                                                            <option value="Pahang"<?php if($geran->negeri == 'Pahang'){ echo "selected"; }?>>Pahang</option>
                                                            <option value="Perak"<?php if($geran->negeri == 'Perak'){ echo "selected"; }?>>Perak</option>
                                                            <option value="Perlis"<?php if($geran->negeri == 'Perlis'){ echo "selected"; }?>>Perlis</option>
                                                            <option value="Selangor"<?php if($geran->negeri == 'Selangor'){ echo "selected"; }?>>Selangor</option>
                                                            <option value="Terengganu"<?php if($geran->negeri == 'Terengganu'){ echo "selected"; }?>>Terengganu</option>
                                                            <option value="Kuala Lumpur"<?php if($geran->negeri == 'Kuala Lumpur'){ echo "selected"; }?>>Kuala Lumpur</option>
                                                            <option value="Melaka"<?php if($geran->negeri == 'Melaka'){ echo "selected"; }?>>Melaka</option>
                                                            <option value="Pulau Pinang"<?php if($geran->negeri == 'Pulau Pinang'){ echo "selected"; }?>>Pulau Pinang</option>
                                                            <option value="Sabah"<?php if($geran->negeri == 'Sabah'){ echo "selected"; }?>>Sabah</option>
                                                            <option value="Sarawak"<?php if($geran->negeri == 'Sarawak'){ echo "selected"; }?>>Sarawak</option>
                                                          </select>
                                                        @error('negeri')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
              
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('daerah') ? ' has-error' : '' }}">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Daerah') }} <label class="text-danger">*</label> </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                      <input type="text" id="daerah" name="daerah"  class="form-control validate[required]"  value="{{ $geran->daerah }}" placeholder="{{ $geran->daerah}}" maxlength="25"  required  />
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
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No.Lot')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="text"  name="lot" placeholder="{{ $geran->no_lot}}" value="{{ $geran->no_lot }}" class="form-control" maxlength="25" required>
                                                        @if ($errors->has('lot'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('lot') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
        
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('tempat') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tempat Geran')}}</label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        @if (!empty($geran->tempat))
                                                        <input type="text"  name="tempat" placeholder="{{ $geran->tempat}}" value="{{ $geran->tempat }}" class="form-control" maxlength="150" >
                                                        @else
                                                        <input type="text"  name="tempat" placeholder="{{ trans('Alamat Geran')}}" value="{{ old('tempat') }}" class="form-control" maxlength="100" >
                                                        @endif
                                                        @if ($errors->has('tempat'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('tempat') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>  
                                            </div>
        
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('luas') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Luas Lot')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
        
                                                        <input type="text"  name="luas" placeholder="{{ $geran->luas_lot }}" value="{{ $geran->luas_lot }}" class="form-control" maxlength="25" required>
                                                        @if ($errors->has('luas'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('luas') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
        
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('kategori') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Kategori Penggunaan Tanah')}}</label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        @if (!empty($geran->kategori_tanah))
                                                        <input type="text"  name="kategori" placeholder="{{ $geran->kategori_tanah }}" value="{{ $geran->kategori_tanah }}" class="form-control" maxlength="25" >
                                                        @else
                                                        <input type="text"  name="kategori" placeholder="{{ trans('Kategori Penggunaan Tanah')}}" value="{{ old('kategori') }}" class="form-control" maxlength="25" >
                                                        @endif
                                                        @if ($errors->has('kategori'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('kategori') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>  
                                            </div>
        
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_lembaran') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Lembarang Piawai')}} </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        @if (!empty($geran->no_lembaran))
                                                        <input type="text"  name="no_lembaran" placeholder="{{ $geran->no_lembaran }}" value="{{ $geran->no_lembaran }}" class="form-control" maxlength="25" >
                                                        @else
                                                        <input type="text"  name="no_lembaran" placeholder="{{ trans('No. Lembarang Piawai')}}" value="{{ old('no_lembaran') }}" class="form-control" maxlength="25" >
                                                        @endif
                                                        @if ($errors->has('no_lembaran'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('no_lembaran') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
        
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_pelan') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Pelan Diperakui')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="text"  name="no_pelan" placeholder="{{ $geran->no_pelan}}" value="{{ $geran->no_pelan }}" class="form-control" maxlength="25" required>
                                                        @if ($errors->has('no_pelan'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('no_pelan') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div> 
                                            </div>
        
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_fail') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Fail')}} <label class="text-danger">*</label> </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="text"  name="no_fail" placeholder="{{ $geran->no_fail}}" value="{{ $geran->no_fail }}" class="form-control" maxlength="25" required >
                                                        @if ($errors->has('no_fail'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('no_fail') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
         
                                            </div>
                                            
                                            <div id="haksementara"  style="display: none;">
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_pt') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. PT')}} </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        @if (!empty($geran->no_pt))
                                                        <input type="text"  name="no_pt" placeholder="{{ $geran->no_pt}}" value="{{ $geran->no_pt }}" class="form-control" maxlength="25" >
                                                        @else
                                                        <input type="text"  name="no_pt" placeholder="{{ trans('No. PT')}}" value="{{ old('no_pt') }}" class="form-control" maxlength="25" >
                                                        @endif
                                                        @if ($errors->has('no_pt'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('no_pt') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
        
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('no_permohonan') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Permohonan Ukur')}} </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        @if (!empty($geran->no_permohonan))
                                                        <input type="text"  name="no_permohonan" placeholder="{{ $geran->no_permohonan}}" value="{{ $geran->no_permohonan }}" class="form-control" maxlength="25" >
                                                        @else
                                                        <input type="text"  name="no_permohonan" placeholder="{{ trans('No. Permohonan Ukur')}}" value="{{ old('no_permohonan') }}" class="form-control" maxlength="25" >
                                                        @endif
                                                        @if ($errors->has('no_permohonan'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('no_permohonan') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Tarikh</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('daftar') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Daftar')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        
                                                        <input type="text"  name="daftar" placeholder="{{ date('j F Y',strtotime($geran->tarikh_daftar)) }}" value=" {{ date('j F Y',strtotime($geran->tarikh_daftar)) }}" class="form-control" maxlength="25" required >
                                                        @if ($errors->has('daftar'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('daftar') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
         
                                            </div>
                                            <div id="haksementaraa" style="display: none;">
                                              <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('tempoh') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tempoh Hakmilik')}} </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                      @if (!empty($geran->tempoh))
                                                        <input type="date"  name="tempoh" placeholder="{{ $geran->tempoh}}" value="{{ $geran->tempoh }}" class="form-control" maxlength="25" >
                                                      @else
                                                      <input type="date"  name="tempoh" placeholder="{{ trans('Tempoh Hakmilik')}}" value="{{ old('tempoh') }}" class="form-control" maxlength="25" >
                                                      @endif
                                                        @if ($errors->has('tempoh'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('tempoh') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
        
                                              </div>
          
                                              
          
                                              <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('keluaran') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Hakmilik Keluaran')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                      @if (!empty($geran->syarat))
                                                        <input type="date"  name="keluaran" placeholder="{{ $geran->tarikh_keluaran}}" value="{{ $geran->tarikh_keluaran }}" class="form-control" maxlength="100" >
                                                      @else
                                                        <input type="date"  name="keluaran" placeholder="{{ trans('Tarikh Hakmilik Keluaran')}}" value="{{ old('keluaran') }}" class="form-control" maxlength="100" >
                                                      @endif
                                                        @if ($errors->has('keluaran'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('keluaran') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
        
                                              </div>
                                        </div>
                                      </div>
                                    </div>
  
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Rekod Ketuanpunyaan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Pemilik')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="text"  name="pemilik" placeholder="{{ $geran->pemilik}}" value="{{ $geran->pemilik }}" class="form-control"  >
                                                        @if ($errors->has('pemilik'))
                                                        <span class="help-block text-danger" autofocus>
                                                            <strong>{{ $errors->first('pemilik') }}</strong>
                                                        </span>
                                                        @endif

                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No Kad Pengenalan')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12 input-group date">
                                                        <input type="text" id="ic"  name="ic" placeholder="{{ $geran->ic}}" value="{{ $geran->ic }}" class="form-control" maxlength="25" >
                                                        @if ($errors->has('ic'))
                                                        <span class="help-block text-danger" autofocus>
                                                            <strong>{{ $errors->first('ic') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        
                                              <div class="row">  
                                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Warganegara')}} <label class="text-danger">*</label></label>
                                                      <div class="col-md-8 col-sm-8 col-xs-12 input-group date">
                                                          <input type="text" id="warga"  name="warga" placeholder="{{ $geran->warga_negara}}" value="{{ $geran->warga_negara }}" class="form-control" maxlength="55" >
                                                          @if ($errors->has('warga'))
                                                          <span class="help-block text-danger" autofocus>
                                                              <strong>{{ $errors->first('warga') }}</strong>
                                                          </span>
                                                          @endif
                                                      </div>
                                                  </div>


        
                                              </div>
                                              <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-9 col-sm-9 col-xs-12"" for="display-name">{{ trans('Alamat Pemilik')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-10 col-sm-10 col-xs-12 input-group date">
                                                        <textarea rows="5" cols="50" name="alamat" placeholder="{{ $geran->alamat}}" value="{{ $geran->alamat}}" class="form-control" ></textarea>
                                                        @if ($errors->has('alamat'))
                                                        <span class="help-block text-danger">
                                                            <strong>{{ $errors->first('alamat') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                              </div>

                                      </div>
                                    </div>

                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Syarat Geran</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('syarat') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Syarat-Syarat Nyata')}} </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
      
                                                      @if (!empty($geran->syarat))
                                                        <input type="text"  name="syarat" placeholder="{{ $geran->syarat}}" value="{{ $geran->syarat }}" class="form-control" maxlength="500" >
                                                      @else
                                                      <input type="text"  name="syarat" placeholder="{{ trans('Syarat-syarat Nyata')}}" value="{{ old('syarat') }}" class="form-control" maxlength="500" >
                                                      @endif
                                                        @if ($errors->has('syarat'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('syarat') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
         
                                            </div>
        
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('kepentingan') ? ' has-error' : '' }} ">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Sekatan-Sekatan Kepentingan')}} </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
      
                                                        @if (!empty($geran->syarat_kepentingan))
                                                        <textarea rows="10" cols="50" name="kepentingan" placeholder="{{ $geran->syarat_kepentingan}}" value="{{ $geran->syarat_kepentingan }}" class="form-control" ></textarea>
                                                        @else
                                                        <textarea rows="10" cols="50" name="kepentingan" placeholder="{{ trans('cth:Geran Kod A dan B')}}" value="{{ old('kepentingan') }}" class="form-control"  ></textarea>
                                                        @endif
      
                                                        @if ($errors->has('kepentingan'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('kepentingan') }}</strong>
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



<script>
    function myFunction() {
      var x = document.getElementById("tajuk").value;
      
      if ( x == "Hakmilik Sementara Daerah" || x == "Hakmilik Sementara Mukim" )
      {
          document.getElementById("haksementara").style.display = "block";
          document.getElementById("haksementaraa").style.display = "block";
      }
      else{
      document.getElementById("haksementara").style.display = "none";
      document.getElementById("haksementaraa").style.display = "none";
      
      }
    }
    </script>




@endsection

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
                    
                            <a href="{!! url('/lokasi/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Geran</b> </a>
                            <a href="{!! url('/lokasi/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Geran</b></a>
                           
                        </nav>                    
                    </div>
                    
                    <div class="linklocation">
                        <span class="tutupbtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Tiada Dalam Pengkalan Data!</strong> Anda boleh skip atau Isikan semua maklumat ini
                        
                      </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                @if (session('error'))
							<div class="alert alert-danger"><span class="fa fa-times"></span><em> {{ session('error') }} </em></div>
						@endif
                                <form id="demo-form2" action="updatelink/{{ $linknew }}" method="post"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left input_mask customerAddForm">
                                    @csrf
                                    <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Geran</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tajuk">{{ trans('Jenis Geran') }} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <select name="tajuk" id="tajuk"  class="form-control" value="{{ old('tajuk') }}"  autocomplete="tajuk" >
                                                        <option value="" disabled selected hidden>Pilih Jenis Geran</option>
                                                        <option value="Geran">Geran</option>
                                                        <option value="Geran Mukim">Geran Mukim</option>
                                                        <option value="Pajakan">Pajakan</option>
                                                        <option value="Pajakan Mukim">Pajakan Mukim</option>
                                                        <option value="Hakmilik Sementara Daerah">Hakmilik Sementara Daerah</option>
                                                        <option value="Hakmilik Sementara Mukim">Hakmilik Sementara Mukim</option>

                                                    </select>
                                                    @if ($errors->has('tajuk'))
                                                        <span class="help-block text-danger" autofocus>
                                                            <strong>{{ $errors->first('tajuk') }}</strong>
                                                        </span>
                                                @endif
                                                </div>
                                            </div>
            
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('No. Hakmilik') }} <label class="text-danger">*</label> </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" id="no_hakmilik" name="no_hakmilik"  class="form-control" value="{{ old('no_hakmilik') }}" placeholder="{{ trans(' No. Hakmilik/SementaraDaerah/SemantaraMunkim')}}" maxlength="25"    />
                                                @if ($errors->has('no_hakmilik'))
                                                <span class="help-block text-danger" autofocus>
                                                    <strong>{{ $errors->first('no_hakmilik') }}</strong>
                                                </span>
                                                @endif
                                                {{-- @error('no_hakmilik')
                                                        <span class="invalid-feedback text-danger" role="alert" >
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror --}}
                                                </div>
                                            </div>
                                        </div>    
        
                                        <div class="row">
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Cukai Tahunan')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="cukai" placeholder="{{ trans('RM ')}}" value="{{ old('cukai') }}" class="form-control"  >
                                                    @if ($errors->has('cukai'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('cukai') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                        </div>

                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <div class="form-check">
                                            
                                            <div class="col-md-8 col-sm-8 col-xs-12 gender">
                                                <input type="checkbox" id="rizab"  name="rizab" value="1" class="form-check-input" value="{{ old('rizab') }}">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12"> {{ trans('Rizab Melayu')}}</label>
                                            </div>
                                            </div>
                                        </div>

                                        <div id="check"  style="display: none;">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Pemberitahuan Warta')}} <label class="text-danger">*</label></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" id="warta"  name="warta" placeholder="{{ trans('')}}" value="{{ old('warta') }}" class="form-control" maxlength="25" >
                                                @if ($errors->has('warta'))
                                                <span class="help-block text-danger" autofocus>
                                                    <strong>{{ $errors->first('warta') }}</strong>
                                                </span>
                                                @endif
                                                {{-- @error('warta')
                                                        <span class="invalid-feedback text-danger" role="alert" >
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror --}}
                                            </div>
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
                                        </div>
                            


                            </div>
                            </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Maklumat Geran</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Negeri') }} <label class="text-danger">*</label> </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <select name="negeri" id="negeri" class="form-control" placeholder="Sila Pilih Negeri" value="{{ old('negeri') }}"  autocomplete="negeri"   >
                                                        <option value="Johor">Johor</option>
                                                        <option value="Kedah">Kedah</option>
                                                        <option value="Kelantan">Kelantan</option>
                                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                        <option value="Pahang">Pahang</option>
                                                        <option value="Perak">Perak</option>
                                                        <option value="Perlis">Perlis</option>
                                                        <option value="Selangor">Selangor</option>
                                                        <option value="Terengganu">Terengganu</option>
                                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                        <option value="Melaka">Melaka</option>
                                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                                        <option value="Sabah">Sabah</option>
                                                        <option value="Sarawak">Sarawak</option>
                                                        </select>
                                                    @if($errors->has('negeri'))
                                                        <span class="help-block text-danger"autofocus>
                                                            <strong>{{ $errors->first('negeri') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">{{ trans('Daerah') }} <label class="text-danger">*</label> </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" id="daerah" name="daerah"  class="form-control"  
                                                    value="{{ old('daerah') }}" placeholder="{{ trans('Sila Isi Daerah')}}" maxlength="25"    />
                                                    @if ($errors->has('daerah'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('daerah') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
        
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No.Lot')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="lot" placeholder="{{ trans('cth: 81000')}}" value="{{ old('lot') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('lot'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('lot') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback  ">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tempat')}}</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="tempat" placeholder="{{ trans('Alamat Geran')}}" value="{{ old('tempat') }}" class="form-control" maxlength="150" >
                                                    @if ($errors->has('tempat'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('tempat') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Luas Lot')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="luas" placeholder="{{ trans('Sila Isi Luas Lot')}}" value="{{ old('luas') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('luas'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('luas') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Kategori Penggunaan Tanah')}}</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="kategori" placeholder="{{ trans('Kategori Penggunaan Tanah')}}" value="{{ old('kategori') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('kategori'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('kategori') }}</strong>
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

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback  ">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Pelan Diperakui')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="no_pelan" placeholder="{{ trans('No. Pelan Diperakui')}}" value="{{ old('no_pelan') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('no_pelan'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('no_pelan') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="row">  
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Fail')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="no_fail" placeholder="{{ trans('No. Fail')}}" value="{{ old('no_fail') }}" class="form-control" maxlength="50" >
                                                    @if ($errors->has('no_fail'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('no_fail') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div id="haksementara"  style="display: none;">
                                        <div class="row">  
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. PT')}} </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="no_pt" placeholder="{{ trans('No. PT')}}" value="{{ old('no_pt') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('no_pt'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('no_pt') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('No. Permohonan Ukur')}} </label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text"  name="no_permohonan" placeholder="{{ trans('No. Permohonan Ukur')}}" value="{{ old('no_permohonan') }}" class="form-control" maxlength="25" >
                                                    @if ($errors->has('no_permohonan'))
                                                    <span class="help-block text-danger" autofocus>
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
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Daftar')}} <label class="text-danger">*</label></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12 date">
                                                    <input type="date"  name="daftar" placeholder="{{ trans('Tarikh Daftar')}}" value="{{ old('daftar') }}" class="form-control" maxlength="25"  />
                                                    @if ($errors->has('daftar'))
                                                    <span class="help-block text-danger" autofocus>
                                                        <strong>{{ $errors->first('daftar') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div id="haksementaraa" style="display: none;">
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tempoh Hakmilik')}}</label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="date" id="tempoh"  name="tempoh" placeholder="{{ trans('Tempoh Hakmilik')}}" value="{{ old('tempoh') }}" class="form-control" maxlength="25" >
                                                        @if ($errors->has('tempoh'))
                                                        <span class="help-block text-danger" autofocus>
                                                            <strong>{{ $errors->first('tempoh') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
        
                                            
        
                                            <div class="row">  
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name">{{ trans('Tarikh Hakmilik Keluaran')}} <label class="text-danger">*</label></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12 input-group date">
                                                        <input type="date" id="keluaran"  name="keluaran" placeholder="{{ trans('Tarikh Hakmilik Keluaran')}}" value="{{ old('keluaran') }}" class="form-control" maxlength="25" >
                                                        @if ($errors->has('keluaran'))
                                                        <span class="help-block text-danger" autofocus>
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
                                                    <input type="text"  name="pemilik" placeholder="{{ trans('Pemilik')}}" value="{{ old('pemilik') }}" class="form-control"  >
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
                                                    <input type="text" id="ic"  name="ic" placeholder="{{ trans(' cth:890302-01-****')}}" value="{{ old('ic') }}" class="form-control" maxlength="25" >
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
                                                        <input type="text" id="warga"  name="warga" placeholder="{{ trans('cth: Malaysia, Singapore eg..')}}" value="{{ old('warga') }}" class="form-control" maxlength="55" >
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
                                                    <textarea rows="5" cols="50" name="alamat" placeholder="{{ trans('Alamat Penuh')}}" value="{{ old('alamat') }}" class="form-control" ></textarea>
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
                                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-9 col-sm-9 col-xs-12" for="display-name">{{ trans('Syarat-Syarat Nyata')}} </label>
                                                <div class="col-md-10 col-sm-10 col-xs-12">
                                                    <input type="text"  name="syarat" placeholder="{{ trans('Syarat-syarat Nyata')}}" value="{{ old('syarat') }}" class="form-control" maxlength="100" >
                                                    @if ($errors->has('syarat'))
                                                    <span class="help-block text-danger">
                                                        <strong>{{ $errors->first('syarat') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">  
                                            <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                                <label class="control-label col-md-9 col-sm-9 col-xs-12" for="display-name">{{ trans('Sekatan-Sekatan Kepentingan')}} </label>
                                                <div class="col-md-10 col-sm-10 col-xs-12">
                                                    <textarea rows="10" cols="50" name="kepentingan" placeholder="{{ trans('cth:Geran Kod A dan B')}}" value="{{ old('kepentingan') }}" class="form-control" ></textarea>
                                                    @if ($errors->has('kepentingan'))
                                                    <span class="help-block text-danger">
                                                        <strong>{{ $errors->first('kepentingan') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Rekod Urusan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">  
                                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-9 col-sm-9 col-xs-12" for="display-name">{{ trans('Rekod Urusan Geran')}} </label>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <textarea rows="10" cols="50" name="urusan" placeholder="{{ trans('Urusan Geran')}}" value="{{ old('urusan') }}" class="form-control"></textarea>
                                                    @if ($errors->has('urusan'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('urusan') }}</strong>
                                                    </span>
                                                    @endif
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                
                        </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pelan Geran</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">  
                                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                                            <label class="control-label col-md-9 col-sm-9 col-xs-12" for="display-name">{{ trans('Gambar Pelan')}} </label>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <input type="file"  name="file" placeholder="{{ trans('Syarat-syarat Nyata')}}" value="{{ old('file') }}"  >
                                                @if ($errors->has('syarat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('syarat') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                
                        </div>


                        
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <a class="btn btn-danger" href="{!! url('/lokasi/senarai')!!}">{{ trans('skip')}}</a>
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



<script>
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
                        document.getElementById("warta").required =false;
                        document.getElementById("tarikh_warta").required = false;
                     }
            });


    });
</script>




@endsection

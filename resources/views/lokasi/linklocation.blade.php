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

                    <div class="linklocation">
                        <span class="tutupbtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Maklumat Geran ada dalam Pengkalan Data</strong> Tekan Butang Confirm Untuk Hubungkan Maklumat Tersebut
                      </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content"> 
                                @if (session('error'))
							<div class="alert alert-danger"><span class="fa fa-times"></span><em> {{ session('error') }} </em></div>
						    @endif
                                <form id="demo-form2" action="{!! url('/lokasi/senarai')!!}" method="get" 
                                enctype="multipart/form-data" data-parsley-validate 
                                         class="form-horizontal form-label-left input_mask customerAddForm">
                                         @csrf
                            

                                         <div class="row justify-content-center">
                                            <div class="col-md-9">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_content">
                                                        <div class="card shadow mb-4">
                                                                    <div class="card-header py-3">
                                                                    <h6 class="m-0 font-weight-bold text-primary">{{ $link->tajuk_geran}}</h6>
                                                                    </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                                                    @if ( $link->tajuk_geran == 'Hakmilik Sementara Mukim')
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. H.S.M') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_hakmilik }} </label><br>
                                                                    @elseif ( $link->tajuk_geran == 'Hakmilik Sementara Daerah')
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. H.S.D') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_hakmilik }} </label><br>
                                                                    @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Hakmilik') }}  </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_hakmilik }} </label><br>
                                                                    @endif
                                
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Negeri') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->negeri }} </label><br>
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Daerah') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->daerah }} </label><br>
                                                                        <label class="control-label col-md-5" for="first-name">{{ trans('Bandar/Pekan/Mukim') }} </label> </label> :   <label class="control-label col-sm-6 " for="first-name">{{ $link->tempat }} </label><br>
                                                                        <label class="control-label col-md-5" for="first-name">{{ trans('Tempat') }}</label>  </label> :   <label class="control-label col-sm-6" for="first-name">{{ $link->tempat }} </label><br>
                                
                                                                 
                                                                        
                                                                     
                                                                    @if ( $link->tajuk_geran == 'Hakmilik Sementara Daerah' ||$link->tajuk_geran == 'Hakmilik Sementara Mukim')
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. PT') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_pt }} </label><br>
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Luas Sementara') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->luas_lot }} </label><br>
                                                                    @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Lot') }}</label>   </label> :<label class="control-label col-sm-6" for="first-name">{{ $link->no_lot }} </label><br>
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Luas Lot') }}</label>   </label> :<label class="control-label col-sm-6" for="first-name">{{ $link->luas_lot }} </label><br>
                                                                    @endif
                                
                                
                                
                                                                        <label class="control-label col-md-5" for="first-name">{{ trans('Kategori Kegunaan Tanah') }}</label>  </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->kategori_tanah }} </label><br>
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Lembaran Piawai') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_lembaran }} </label><br>
                                
                                
                                
                                                                    @if ( $link->tajuk_geran == 'Hakmilik Sementara Daerah' || $link->tajuk_geran == 'Hakmilik Sementara Mukim')
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Permohonan Ukur') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_permohonan }} </label><br>
                                                                    @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Pelan Diperakui') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_pelan }} </label><br>
                                                                    @endif
                                
                                                                    
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Fail') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->no_fail }} </label><br>
                                                                        <br>
                                
                                                                    @if ($link->rizab == 1)
                                                                    <div class="card bg- text-black shadow " style="width: 150%;">
                                                                        <div class="card-body">
                                                                            Tanah Rizab Melayu 
                                                                            <br> No. Pemberitahuan Warta :    
                                                                            <br> Bertarikh :
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                
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
                                                                    <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                                                        @if ( $link->tajuk_geran == 'Hakmilik Sementara Mukim' || $link->tajuk_geran == 'Hakmilik Sementara Daerah')
                                                                            
                                                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Tempoh Penyerahan Geran') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->tempoh }} </label><br>
                                                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Didaftarkan pada') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->tarikh_daftar }} </label><br>
                                                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Dokumen Hakmilik Dikeluarkan') }}  </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->tarikh_keluaran }} </label><br>
                                                                        @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Didaftarkan pada') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->tarikh_daftar }} </label><br>
                                                                        @endif
                                
                                                                           
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                
                                                        <div class="card shadow mb-4">
                                                            <div class="card-header py-3">
                                                            <h6 class="m-0 font-weight-bold text-primary">Syarat-Syarat Khas Mengenai {{ $link->tajuk_geran}}</h6>
                                                            </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                                                    @if ( $link->syarat == '' )
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Syarat-Syarat Nyata') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">Tiada </label><br>
                                                                        @if ( $link->syarat_kepentingan == '')
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">Tiada </label><br>
                                                                        @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->syarat_kepentingan }} </label><br>
                                                                        @endif
                                                                    @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Syarat-Syarat Nyata') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->syarat }} </label><br>
                                                                        @if ( $link->syarat_kepentingan == '')
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">Tiada </label><br>
                                                                        @else
                                                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $link->syarat_kepentingan }} </label><br>
                                                                        @endif
                                                                    @endif
                                
                                                                       
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Gambar Pelan {{ $link->tajuk_geran}}</h6>
                                                        </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                                                <div class="row justify-content-center">
                                                                    
                                                                    <div class="col-md-9">
                                                                        
                                                                    <img src ="{{asset('storage/'. $link->gambar_lot)}}" alt="" class="img-thumbnail">
                                                                    
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
                                            </div>
                               

                            
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <a class="btn btn-danger" href="{!! url('/lokasi/senarai')!!}">{{ trans('Skip')}}</a>
                                        <button type="submit" class="btn btn-success customerAddSubmitButton">{{ trans('Confirm')}}</button>
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

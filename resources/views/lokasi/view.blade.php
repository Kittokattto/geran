@extends('layouts.main')

@section('title')
Fail Kes
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
                    
                            <a href="{!! url('/lokasi/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b> Senarai Lokasi Fail Kes</b> </a>
                            <a href="{!! url('/lokasi/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b> Tambah Lokasi fail kes</b></a>
                            <a href="{!! url('/lokasi/view/'.$lokasi->id)!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b> Lokasi fail kes</b></a>
                        </nav>                    
                    </div>
                    
            <div class="row justify-content-center">
            <div class="col-md-9">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Maklumat Lokasi Fail</h6>
                                    </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                    
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Tajuk Fail') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->tajuk_file }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Jenis Fail') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->jenis_file }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Kod Fail') }}  </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->kod }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Status Fail') }}</label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->status }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Jumlah Salinan') }}</label> : <label class="control-label col-sm-6 " for="first-name">{{ $lokasi->copy }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Tarikh Disimpan') }}</label> : <label class="control-label col-sm-6 " for="first-name">{{ $lokasi->date_locate }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Lokasi') }} </label> : <label class="control-label col-sm-3 " for="first-name">
                                            
                                        
                                            <div class="card-body bg-primary text-white shadow">

                                               <div class="row justify-content-center">{{ $lokasi->lokasi }}
                                            </div>
                                            </div>
                                        
                                        </label><br>    


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
                                    
                                    <div class="col-md-8 col-sm-8 col-xs-8 form-group">

                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Nama Pemilik') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->pemilik }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('No. Hakmilik Fail') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->no_hakmilik }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Negeri') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->negeri }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Daerah') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->daerah }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Lot Tanah') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->no_lot }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Tempat/Alamat') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->tempat }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Info Fail') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $lokasi->info }} </label><br>

                                        
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







@endsection

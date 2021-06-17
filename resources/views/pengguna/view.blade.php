@extends('layouts.main')

@section('title')
Pengguna
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
                    
                            <a href="{!! url('/pengguna/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Pengguna</b> </a>
							<a href="{!! url('/pengguna/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Pengguna</b></a>
                            <a href="{!! url('/pengguna/show/'.$user->id)!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b> Pengguna</b></a>
                        </nav>                    
                    </div>
                    
            <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Maklumat Pengguna</h6>
                                    </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                    
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Nama') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $user->name }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No Telefon') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $user->phone }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Email') }}  </label> : <label class="control-label col-sm-6" for="first-name">{{ $user->email }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Alamat') }}</label> : <label class="control-label col-sm-6" for="first-name">{{ $user->address }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Jabatan') }}</label> : <label class="control-label col-sm-6 " for="first-name">{{ $user->department }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Peranan') }}</label> : <label class="control-label col-sm-6 " for="first-name">{{ $user->role }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Didaftar Oleh') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $user->registerBy }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Tarikh Mendaftar') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $user->created_at }} </label><br>
                                            
                                        
        


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

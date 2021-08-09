@extends('layouts.main')

@section('title')
Tambah Pengguna
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

			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >

					<div class="card mb-4 py-3 border-bottom-secondry">
						

						<nav class="tab-link" style="margin-left: 8px;" >
					
							<a href="{!! url('/pengguna/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Pengguna</b> </a>
							<a href="{!! url('/pengguna/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Pengguna</b></a>
                            
						</nav>
					
					
				</div>
                
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-9">
                                <div class="card" style="margin:50px 0px 0px -50px; ">
                                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Sosial Media</h6>
                                        </div>
                                    <div class="card-body">
                                        
                                            
                                        <form method="POST" action="{{ url('/user/store') }}" class="form-horizontal upperform">
                                            @csrf
                    
                                            <div class="form-group row">
                                                <label for="linked" class="col-md-4 col-form-label text-md-right">{{ __('Linked In') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="linked" type="text" class="form-control @error('linked') is-invalid @enderror" name="linked" value="{{ old('linked') }}"  autocomplete="linked" autofocus>
                    
                                                    @error('linked')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="github" class="col-md-4 col-form-label text-md-right">{{ __('Git Hub') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="github" type="text" class="form-control @error('github') is-invalid @enderror" name="github" value="{{ old('github') }}"  autocomplete="github" autofocus>
                    
                                                    @error('github')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="insta" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="insta" type="text" class="form-control @error('insta') is-invalid @enderror" name="insta" value="{{ old('insta') }}"  autocomplete="insta">
                    
                                                    @error('insta')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="twitter" class="col-md-4 col-form-label text-md-right">{{ __('Twitter') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ old('twitter') }}"  autocomplete="twitter" autofocus>
                    
                                                    @error('twitter')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}"  autocomplete="facebook" autofocus>
                    
                                                    @error('facebook')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
				</div>
			</div>
		</div>
	</div>  


@endsection

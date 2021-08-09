@extends('layouts.main')

@section('title')
Mengemaskini Pengguna
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
			{{-- @if(session('message'))
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							@if(session('message') == 'Successfully Submitted')
							<label for="checkbox-10 colo_success"> {{trans('app.Successfully Submitted')}}  </label>
						   @elseif(session('message')=='Successfully Updated')
						   <label for="checkbox-10 colo_success"> {{ trans('app.Successfully Updated')}}  </label>
						   @elseif(session('message')=='Successfully Deleted')
						   <label for="checkbox-10 colo_success"> {{ trans('app.Successfully Deleted')}}  </label>
						   @endif
						</div>
					</div>
				</div>
			@endif --}}
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="card mb-4 py-3 border-bottom-secondry">
						

						<nav class="tab-link" style="margin-left: 5px" >
					
							<a href="{!! url('/pengguna/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Pengguna</b> </a>
							<a href="{!! url('/pengguna/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Pengguna</b></a>
                            <a href="{!! url('/pengguna/edit/'.$user->id)!!}" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Mengemaskini Pengguna</b></a>
						</nav>
					
					
				</div>
                
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card" style="margin:50px 0px 0px -50px; ">
                                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    
                                    <div class="card-body">
                                        <form method="POST" action="update/{{ $user->id }}">
                                            @csrf
                    
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="{{$user->name}}" required autocomplete="name" autofocus>
                    
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('No Telefon') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" placeholder="{{$user->phone}}" required autocomplete="phone" autofocus>
                    
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="{{$user->email}}" required autocomplete="email">
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" placeholder="{{$user->address}}" required autocomplete="address" autofocus>
                    
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ $user->department }}" placeholder="{{$user->department}}" required autocomplete="name" autofocus>
                    
                                                    @error('department')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if ($user->role == 'admin')
                                            <div class="form-group row">
                                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Peranan') }}</label>
                    
                                                <div class="col-md-6">
                                                    {{-- <input id="role" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="name" autofocus> --}}
                                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror"  placeholder="{{$user->role}}" required autocomplete="role" autofocus>
                                                        <option value="admin" <?php if($user->role == 'admin'){ echo "selected"; }?>>Admin</option>
                                                        <option value="staff" <?php if($user->role == 'staff'){ echo "selected"; }?>>Staff</option>
                                                      </select>
                                                    @error('role')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif

                    

                    

                    
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Kemaskini') }}
                                                    </button>

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


@endsection

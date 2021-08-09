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
                                        
                                            
                                        <form method="POST" action="" class="form-horizontal upperform">
                                            @csrf
                    
                                            <div class="row justify-content-center" >
                                                <div class="editbut">
                                                    <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg"  id="profile4" alt="Snow" >
                                                    
                                                  </div>
                                              </div>
                                              
                                              
                                                <span name="custom" id="custom" class="btn btn-outline-primary">
                                                <input class="btn btn-outline-primary" id="file" hidden type="file" onchange="img_pathUrl(this);" name="file" value="{{ old('file') }}" hidden/>Change photo
                                            </span><span id="custom-span">No file Choose</span>
                                              {{-- <div class="profile4">
                                                <label class="-label" for="file">
                                                  <span class="glyphicon glyphicon-camera"></span>
                                                  <span>Change Image</span>
                                                </label>
                                                <input id="file" type="file" onchange="loadFile(event)"/>
                                                <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg" id="output" width="200" />
                                              </div> --}}
                                  
                                            

                    
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

    <script>
        const realFileBtn = document.getElementById("file");
        const custom = document.getElementById("custom");
        const customTxt = document.getElementById("custom-span");

        custom.addEventListener("click", function(){
                realFileBtn.click();
        });

        realFileBtn.addEventListener ("change", function(){
            if (realFileBtn.value)
            {
                customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/);
            }
            else{
                customTxt.innerHTML = "No Choose File";
            }
        });
    </script>
    <script>
       function img_pathUrl(input){
        $('#profile4')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
    </script>


@endsection

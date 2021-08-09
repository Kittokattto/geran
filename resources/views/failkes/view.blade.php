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
        
<div ></div>
            <div id="dgg" style="display: none;"> <a href="" id="book"style="margin-right: 8px;"><input type="checkbox" data-width="130" data-height="30" checked data-toggle="toggle" data-on="<i class='fa fa-bookmark'></i> Bookmark" data-off="<i class='fa fa-bookmark'></i> Bookmark"></a></div>
                    <div class="card mb-4 py-3 border-bottom-secondry">
                        <nav class="tab-link"  style="margin-left: 8px;" >
                    
                            <a href="{!! url('/failkes/senarai')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Nama Fail Kes</b> </a>
                            <a href="{!! url('/failkes/tambah')!!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah fail kes</b></a>

                           

                            @if (!empty($bookmark))
                            <a href=""  class="float-right" style="margin-right: 8px;"><input  id="bookmark"  type="checkbox" value="{{ $geran->geran_id}}" data-width="130" data-height="30"  data-toggle="toggle"  data-onstyle="primary" data-offstyle="outline-primary" data-on="<i class='fa fa-bookmark'></i> Bookmark" data-off="<i class='fa fa-bookmark'></i> Bookmark"></a>
                            @else
                            <a href=""  class="float-right" style="margin-right: 8px;"><input  id="bookmark" checked  type="checkbox" value="{{ $geran->geran_id}}" data-width="130" data-height="30"  data-toggle="toggle"  data-onstyle="primary" data-offstyle="outline-primary" data-on="<i class='fa fa-bookmark'></i> Bookmark" data-off="<i class='fa fa-bookmark'></i> Bookmark"></a>
                            @endif
                        </nav>              

                    </div>
                    
            <div class="row justify-content-center">
            <div class="col-md-9">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{ $geran->tajuk_geran}}</h6>
                                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                    @if ( $geran->tajuk_geran == 'Hakmilik Sementara Mukim')
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. H.S.M') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_hakmilik }} </label><br>
                                    @elseif ( $geran->tajuk_geran == 'Hakmilik Sementara Daerah')
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. H.S.D') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_hakmilik }} </label><br>
                                    @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Hakmilik') }}  </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_hakmilik }} </label><br>
                                    @endif

                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Negeri') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->negeri }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Daerah') }} </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->daerah }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Bandar/Pekan/Mukim') }} </label> </label> :   <label class="control-label col-sm-6 " for="first-name">{{ $geran->tempat }} </label><br>
                                        <label class="control-label col-md-5" for="first-name">{{ trans('Tempat') }}</label>  </label> :   <label class="control-label col-sm-6" for="first-name">{{ $geran->tempat }} </label><br>

                                 
                                        
                                     
                                    @if ( $geran->tajuk_geran == 'Hakmilik Sementara Daerah' ||$geran->tajuk_geran == 'Hakmilik Sementara Mukim')
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. PT') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_pt }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Luas Sementara') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->luas_lot }} </label><br>
                                    @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Lot') }}</label>   </label> :<label class="control-label col-sm-6" for="first-name">{{ $geran->no_lot }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Luas Lot') }}</label>   </label> :<label class="control-label col-sm-6" for="first-name">{{ $geran->luas_lot }} </label><br>
                                    @endif



                                        <label class="control-label col-md-5" for="first-name">{{ trans('Kategori Kegunaan Tanah') }}</label>  </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->kategori_tanah }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Lembaran Piawai') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_lembaran }} </label><br>



                                    @if ( $geran->tajuk_geran == 'Hakmilik Sementara Daerah' || $geran->tajuk_geran == 'Hakmilik Sementara Mukim')
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Permohonan Ukur') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_permohonan }} </label><br>
                                    @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Pelan Diperakui') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_pelan }} </label><br>
                                    @endif

                                    
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No. Fail') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->no_fail }} </label><br>
                                        <br>

                                    @if ($geran->rizab == 1)
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
                                        @if ( $geran->tajuk_geran == 'Hakmilik Sementara Mukim' || $geran->tajuk_geran == 'Hakmilik Sementara Daerah')
                                            
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Tempoh Penyerahan Geran') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->tempoh }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Didaftarkan pada') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->tarikh_daftar }} </label><br>
                                            <label class="control-label col-sm-5" for="first-name">{{ trans('Dokumen Hakmilik Dikeluarkan') }}  </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->tarikh_keluaran }} </label><br>
                                        @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Didaftarkan pada') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->tarikh_daftar }} </label><br>
                                        @endif

                                           
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
                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                    
                                        
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Nama Pemilik') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->pemilik }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('No Kad Pengenalan') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->ic }} </label><br>
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Warganegara') }}  </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->warga_negara }} </label><br>
                                    
                                    <label class="control-label col-sm-5" for="first-name">{{ trans('Alamat') }}</label>   </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->alamat }} </label><br>
                                    

                                       
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Syarat-Syarat Khas Mengenai {{ $geran->tajuk_geran}}</h6>
                            </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                    @if ( $geran->syarat == '' )
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Syarat-Syarat Nyata') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">Tiada </label><br>
                                        @if ( $geran->syarat_kepentingan == '')
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">Tiada </label><br>
                                        @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->syarat_kepentingan }} </label><br>
                                        @endif
                                    @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Syarat-Syarat Nyata') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->syarat }} </label><br>
                                        @if ( $geran->syarat_kepentingan == '')
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">Tiada </label><br>
                                        @else
                                        <label class="control-label col-sm-5" for="first-name">{{ trans('Sekatan-Sekatan Kepentingan') }} </label> </label> : <label class="control-label col-sm-6" for="first-name">{{ $geran->syarat_kepentingan }} </label><br>
                                        @endif
                                    @endif

                                       
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Gambar Pelan {{ $geran->tajuk_geran}}</h6>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                                <div class="row justify-content-center">
                                    
                                    <div class="col-md-9">
                                        
                                    <img src ="{{asset('storage/'. $geran->gambar_lot)}}" alt="" class="img-thumbnail">
                                    
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


<script>
    document.addEventListener("DOMContentLoaded", function(event) {

       

        $("#bookmark").change(function(){

            var x = document.getElementById('bookmark').checked
            geran_id = $('#bookmark').val();
            // var url = $('this').attr('bookmarkurl');
            if ( x == true)
            {
                document.getElementById("dgg").style.display = "none";
               
                $.ajax({         
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'post',
                            url:"{!! url('/failkes/show/setremovebookmark') !!}",
                            data:{ geran_id:geran_id },
                            success:function(response)
                            {
                                alert("Remove from Bookmark");
                            },

                    });

            }
            else
            {
                document.getElementById("dgg").style.display = "none";

                $.ajax({         
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'post',
                            url:"{!! url('/failkes/show/setbookmark') !!}",
                            data:{geran_id:geran_id},
                            success:function(response)
                            {
                                alert("Set as Bookmark");
                            },

                    });
            }
        });

       


    });
</script>




@endsection

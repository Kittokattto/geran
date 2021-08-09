@extends('layouts.main')
@section('title')
Dashboard
@endsection
@section('content')
<!-- Content Row -->
<div class="row">
    
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Fail</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $geran}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pengguna}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perkembangan Tugas
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$percent}}%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: {{$percent}}%" aria-valuenow="{{$percent}}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Fail yang di tanda</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_book}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4" >
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Fail Terkini</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body" >
                
                <div class="table-responsive" id="proTeamScroll" tabindex="2" style="height: overflow: hidden; outline: none;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. HM</th>
                            <th>Jenis Geran</th>
                            <th>No. Lot</th>
                            <th>No. Pelan</th>
                            <th>No. Fail</th>
                            <th>Tarikh Daftar</th>
                            <th>Didaftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($fail))
                        @foreach( $fail as $fails)
                        <tr>
                            <td>
                                {{$fails->no_hakmilik}}
                            </td>
                            <td>
                                <h6 class="mb-0 font-13">{{$fails->tajuk_geran}}</h6>
                                
                            </td>
                            <td>{{$fails->no_lot}}</td>
                            <td>
                                {{$fails->no_pelan}}
                            </td>
                            <td>
                                <div class="badge-outline col-red">{{$fails->no_fail}}</div>
                            </td>
                            <td >
                                {{$fails->tarikh_daftar}}
                            </td>
                            <td>
                                <a href="{!! url('/failkes/show/'.$fails->geran_id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('View') }}</button></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        {{-- <tr>
                            <td class="table-img"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            </td>
                            <td>
                                <h6 class="mb-0 font-13">Android Game App</h6>
                                <p class="m-0 font-12">
                                    Assigned to<span class="col-green font-weight-bold"> Sarah Smith</span>
                                </p>
                            </td>
                            <td>22-05-2019</td>
                            <td class="text-truncate">
                                <ul class="list-unstyled order-list m-b-0">
                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                    <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                </ul>
                            </td>
                            <td>
                                <div class="badge-outline col-green">Low</div>
                            </td>
                            <td class="align-middle">
                                <div class="progress-text">55%</div>
                                <div class="progress" data-height="6" style="height: 6px;">
                                    <div class="progress-bar bg-purple" data-width="55%" style="width: 55%;"></div>
                                </div>
                            </td>
                            <td>
                                <a data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-img"><img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="">
                            </td>
                            <td>
                                <h6 class="mb-0 font-13">Java Web Service</h6>
                                <p class="m-0 font-12">
                                    Assigned to<span class="col-green font-weight-bold"> Cara Stevens</span>
                                </p>
                            </td>
                            <td>11-04-2019</td>
                            <td class="text-truncate">
                                <ul class="list-unstyled order-list m-b-0">
                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian"></li>
                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="user" data-toggle="tooltip" title="" data-original-title="John Deo"></li>
                                    <li class="team-member team-member-sm"><img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="user" data-toggle="tooltip" title="" data-original-title="Sarah Smith"></li>
                                    <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                                </ul>
                            </td>
                            <td>
                                <div class="badge-outline col-blue">Medium</div>
                            </td>
                            <td class="align-middle">
                                <div class="progress-text">70%</div>
                                <div class="progress" data-height="6" style="height: 6px;">
                                    <div class="progress-bar" data-width="70%" style="width: 70%;"></div>
                                </div>
                            </td>
                            <td>
                                <a data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                <a data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr> --}}
                        
                        

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengguna Baharu</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                

            <table class="mb-0 table table-hover user-dashboard-info-box ">
                <thead>
                    <tr >

                        <th class="align-middle bt-0">Nama Pekerja </th>
                        <th class="align-middle bt-0">Status</th>
                        {{-- <th class="align-middle bt-0">People</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($user))
                    @foreach ($user as $users)
                    <tr class="candidates-list">

                       
                            <td class="title">
                              <div class="thumb">
                                <img  class="img-fluid" src="{{asset('storage/'. $users->gambar)}}">
                              </div>
                              <div class="candidate-list-details">
                                <div class="candidate-list-info">
                                  <div class="candidate-list-title">
                                    <h6 class="mb-0"><a href="{!! url('/pengguna/show/'.$users->id) !!}">{{getssmallLength($users->name)}}</a></h6>
                                  </div>
                                  <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                      <li><i class="fas fa-filter pr-1"></i>{{$users->department}}</li>
                                      <li><i class="fas fa-map-marker-alt pr-1"></i>{{getssmallLength($users->address)}}</li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="align-middle">
                                <div class="mb-2 progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                </div>
                                <div>Tasks Completed:<span class="text-inverse">36/94</span></div>
                            </td>
                    </tr>
                    @endforeach
                    @endif

                 

                </tbody>
            </table>


        </div>
    </div>
</div>

<!-- Content Row -->
{{-- <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span
                        class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span
                        class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span
                        class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span
                        class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span
                        class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a
                        target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                    constantly updated collection of beautiful svg images that you can use
                    completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                    unDraw &rarr;</a>
            </div>
        </div>

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div>

    </div>
</div> --}}
@endsection

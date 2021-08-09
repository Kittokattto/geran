@extends('home')
@section('table')


                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th class="align-middle bt-0">Project</th>
                                <th class="align-middle bt-0">Status</th>
                                <th class="align-middle bt-0">Tasks Completed</th>
                                <th class="align-middle bt-0">People</th>
                                <th class="align-middle bt-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td class="align-middle">
                                    <div><a href="/apps/tasks/list">Ergonomic real-time adapter</a></div><span>Last Edited by: Savanah Durgan <br>Sunday, 12 June, 2018</span></td>
                                
                                <td class="align-middle">
                                    <div class="mb-2 progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                    </div>
                                    <div>Tasks Completed:<span class="text-inverse">36/94</span></div>
                                </td>
                                <td class="align-middle">
                                    <div class="avatar-image avatar-image--loaded">
                                        <div class="avatar avatar--md avatar-image__image">
                                            <div class="avatar__content"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"></div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>

                                <td class="align-middle">
                                    <div><a href="/apps/tasks/list">Stand-alone clear-thinking initiative</a></div><span>Last Edited by: Brando Gutkowski <br>Friday, 12 December, 2018</span></td>
                                
                                <td class="align-middle">
                                    <div class="mb-2 progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                    </div>
                                    <div>Tasks Completed:<span class="text-inverse">36/94</span></div>
                                </td>
                                <td class="align-middle">
                                    <div class="avatar-image avatar-image--loaded">
                                        <div class="avatar avatar--md avatar-image__image">
                                            <div class="avatar__content"><img src="https://bootdey.com/img/Content/avatar/avatar2.png"></div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                            
                                <td class="align-middle">
                                    <div><a href="/apps/tasks/list">Configurable homogeneous knowledge user</a></div><span>Last Edited by: Wilmer Gorczany <br>Tuesday, 12 June, 2018</span></td>
                                
                                <td class="align-middle">
                                    <div class="mb-2 progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                    </div>
                                    <div>Tasks Completed:<span class="text-inverse">36/94</span></div>
                                </td>
                                <td class="align-middle">
                                    <div class="avatar-image avatar-image--loaded">
                                        <div class="avatar avatar--md avatar-image__image">
                                            <div class="avatar__content"><img src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
   
                        </tbody>
                    </table>
              
    
@endsection
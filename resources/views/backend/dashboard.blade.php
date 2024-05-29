@extends('layouts.backend')

@section('styles')
    <!-- Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
@endsection

@section('page-header')
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-title">Welcome {{auth()->user()->username}}!</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection

@section('content')


<div class="row">
       @if(auth()->user()->status == 0)
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                <div class="dash-widget-info">
                   
                    <h3>{{$approvedLeaveCount??''}}</h3>
                   
                    <span>Approve Leaves</span>
                </div>
            </div>
        </div>
    </div>
     <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                <div class="dash-widget-info">
                   
                    <h3>{{$disLeaveCount ??''}}</h3>
                   
                    <span> Disapprove  Leaves</span>
                </div>
            </div>
        </div>
    </div>

@endif
                 @if(auth()->user()->status == 1)


  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                <div class="dash-widget-info">
                    <h3>112</h3>
                    <span>Projects</span>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                <div class="dash-widget-info">
                    <h3>{{$clients_count}}</h3>
                    <span>Clients</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                <div class="dash-widget-info">
                    <h3>37</h3>
                    <span>Tasks</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                <div class="dash-widget-info">
                    <h3>{{$employee_count}}</h3>
                    <span>Employees</span>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div>

        
</div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<iframe src="https://calendar.google.com/calendar/embed? src=https://calendar.google.com/calendar/u/0/r%40group.calendar.google.com& ctz=india%2Fpunjab" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
</div>


    <div class="row">
        <div class="col-md-12">
        <div class="row">

            <div class="col-md text-center">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                        <i class="bi bi-balloon-fill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0dcaf0" class="bi bi-balloon-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8.48 10.901C11.211 10.227 13 7.837 13 5A5 5 0 0 0 3 5c0 2.837 1.789 5.227 4.52 5.901l-.244.487a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.244-.487ZM4.352 3.356a4.004 4.004 0 0 1 3.15-2.325C7.774.997 8 1.224 8 1.5c0 .276-.226.496-.498.542-.95.162-1.749.78-2.173 1.617a.595.595 0 0 1-.52.341c-.346 0-.599-.329-.457-.644Z"/>
  </svg>
                        </i>Upcoming Events
                             <i class="bi bi-balloon-fill"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#0dcaf0" class="bi bi-balloon-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8.48 10.901C11.211 10.227 13 7.837 13 5A5 5 0 0 0 3 5c0 2.837 1.789 5.227 4.52 5.901l-.244.487a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.244-.487ZM4.352 3.356a4.004 4.004 0 0 1 3.15-2.325C7.774.997 8 1.224 8 1.5c0 .276-.226.496-.498.542-.95.162-1.749.78-2.173 1.617a.595.595 0 0 1-.52.341c-.346 0-.599-.329-.457-.644Z"/>
  </svg></h3>
<!--                         <div class="container">
                            <p class="birthday"><img src="" alt="" class="rounded-left"> Grishav Sharma
                                <i class="bi bi-cake"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-cake" viewBox="0 0 16 16">
  <path d="m7.994.013-.595.79a.747.747 0 0 0 .101 1.01V4H5a2 2 0 0 0-2 2v3H2a2 2 0 0 0-2 2v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a2 2 0 0 0-2-2h-1V6a2 2 0 0 0-2-2H8.5V1.806A.747.747 0 0 0 8.592.802l-.598-.79ZM4 6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v.414a.911.911 0 0 1-.646-.268 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0A.911.911 0 0 1 4 6.414zm0 1.414c.49 0 .98-.187 1.354-.56a.914.914 0 0 1 1.292 0c.748.747 1.96.747 2.708 0a.914.914 0 0 1 1.292 0c.374.373.864.56 1.354.56V9H4zM1 11a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.793l-.354.354a.914.914 0 0 1-1.293 0 1.914 1.914 0 0 0-2.707 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0L1 11.793zm11.646 1.854a1.915 1.915 0 0 0 2.354.279V15H1v-1.867c.737.452 1.715.36 2.354-.28a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.708 0a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.707 0a.914.914 0 0 1 1.293 0Z"/>
  </svg></i>
                                <br><span style="font-size: 14px; color: black;">dd/mm/yy</span></p>
                            <p class="birthday"><img src="" alt="" class="rounded-left"> Nikhil<br><span style="font-size: 14px; color: black;">dd/mm/yy</span></p>
                            <p class="birthday"><img src="" alt="" class="rounded-left"> Himanshu<br><span style="font-size: 14px; color: black;">dd/mm/yy</span></p>
                            <p class="birthday"><img src="" alt="" class="rounded-left"> Reena<br><span style="font-size: 14px; color: black;">dd/mm/yy</span></p>
                            <p class="birthday"><img src="" alt="" class="rounded-left"> Jai<br><span style="font-size: 14px; color: black;">dd/mm/yy</span></p>

                        </div> -->

<div class="row staff-grid-row">

            <div class="col-md col-sm col-12 col-lg col-xl">
                <div class="profile-widget" style="background: linear-gradient(to bottom, rgb(255 255 255 / 52%), #0dcaf066);">
                    <div class="profile-img">
                        <a href="javascript:void(0)" class="avatar"><img alt="avatar" src="assets/img/profiles/default.jpg"></a>
                    </div>
                    <p class="name1"><b>Grishav Sharma</b></p>
                    <h1 class="bday1">" Wishing You A very very Happy Birthday<br>From Team <b>KODE<span style="color: #0dcaf0;">GURUS</span> "</b></h1>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a data-id="" data-firstname="" data-lastname="" data-email="" data-phone="" data-avatar="" data-company="" data-designation="" data-department="" class="dropdown-item editbtn" href="javascript:void(0)" data-toggle="modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a data-id="" class="dropdown-item deletebtn" href="javascript:void(0)" data-toggle="modal" ><i class="fa fa-trash-o m-r-5"></i></a>
                    </div>
                    </div>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="javascript:void(0)"></a></h4>
                    <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="javascript:void(0)"></a></h5>

                </div>
            </div>
       
        <x-modals.delete :route="'employee.destroy'" :title="'Employee'" />
</div>










                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-group m-b-30">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">New Employees</span>
                        </div>
                        <div>
                            <span class="text-success">+10%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">10</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Overall Employees 218</p>
                </div>
            </div>
        
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">Earnings</span>
                        </div>
                        <div>
                            <span class="text-success">+12.5%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">$1,42,300</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Previous Month <span class="text-muted">$1,15,852</span></p>
                </div>
            </div>
        
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">Expenses</span>
                        </div>
                        <div>
                            <span class="text-danger">-2.8%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">$8,500</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Previous Month <span class="text-muted">$7,500</span></p>
                </div>
            </div>
        
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <span class="d-block">Profit</span>
                        </div>
                        <div>
                            <span class="text-danger">-75%</span>
                        </div>
                    </div>
                    <h3 class="mb-3">$1,12,000</h3>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">Previous Month <span class="text-muted">$1,42,000</span></p>
                </div>
            </div>
        </div>
    </div>  
</div>

<!-- Statistics Widget -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill dash-statistics">
            <div class="card-body">
                <h5 class="card-title">Statistics</h5>
                <div class="stats-list">
                    <div class="stats-info">
                        <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">Task Statistics</h4>
                <div class="statistics">
                    <div class="row">
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box mb-4">
                                <p>Total Tasks</p>
                                <h3>385</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box mb-4">
                                <p>Overdue Tasks</p>
                                <h3>19</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="progress mb-4">
                    <div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
                </div>
                <div>
                    <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Completed Tasks <span class="float-right">166</span></p>
                    <p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Inprogress Tasks <span class="float-right">115</span></p>
                    <p><i class="fa fa-dot-circle-o text-success mr-2"></i>On Hold Tasks <span class="float-right">31</span></p>
                    <p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Pending Tasks <span class="float-right">47</span></p>
                    <p class="mb-0"><i class="fa fa-dot-circle-o text-info mr-2"></i>Review Tasks <span class="float-right">5</span></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body">
                <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ml-2">5</span></h4>
                <div class="leave-info-box">
                    <div class="media align-items-center">
                        <a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                        <div class="media-body">
                            <div class="text-sm my-0">Martin Lewis</div>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-6">
                            <h6 class="mb-0">4 Sep 2019</h6>
                            <span class="text-sm text-muted">Leave Date</span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="badge bg-inverse-danger">Pending</span>
                        </div>
                    </div>
                </div>
                <div class="leave-info-box">
                    <div class="media align-items-center">
                        <a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                        <div class="media-body">
                            <div class="text-sm my-0">Martin Lewis</div>
                        </div>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="col-6">
                            <h6 class="mb-0">4 Sep 2019</h6>
                            <span class="text-sm text-muted">Leave Date</span>
                        </div>
                        <div class="col-6 text-right">
                            <span class="badge bg-inverse-success">Approved</span>
                        </div>
                    </div>
                </div>
                <div class="load-more text-center">
                    <a class="text-dark" href="javascript:void(0);">Load More</a>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>
<!-- /Statistics Widget -->


@endsection
@section('scripts')
<!-- Chart JS -->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/js/chart.js"></script>
@endsection
@extends('master')


@section('content')

   <!-- main dashboard -->
   <section class="dashboard">
    <!-- wrapper -->
    <div class="dashboard_wrapper">

        <!-- sidebar -->
        @include('sidebar')
        <!-- dashboard body -->
        <div class="dashboard_body">

               <!-- admin header -->
               <div class="dashboard_header">

                <!-- dashboard toggole -->
                <div class="toggle_nav" id="dashboard_toggle">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <!-- content -->
            <div class="dashboard_body_content">

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <span class="ti-id-badge" style="font-size: 30px"></span>
                                </div>
                                <h5 class="font-16 text-uppercase mt-0 text-white-50">Total <br> Employees</h5>
                            </div>
                            <h1 class="font-500 float-right"></h1>
                            <span class="ti-user float-left" style="font-size: 71px"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <i class=" ti-check-box " style="font-size: 30px"></i>
                                </div>
                                <h5 class="font-16 text-uppercase mt-0 text-white-50">On Time <br> Today</h5>
                            </div>
                            <h1 class="font-500 float-right"> <i class=" text-success ml-2"></i></h1>
                                <span class="peity-donut float-left" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72"></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-left mini-stat-img mr-4">
                                    <i class="ti-alert" style="font-size: 30px"></i>
                                </div>
                                <h5 class="font-16 text-uppercase mt-0 text-white-50">Late <br> Today</h5>


                            </div>
                            <h1 class="font-500 float-right"><i class=" text-success ml-2"></i></h1>
                                <span class="peity-donut float-left" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72"></span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- end row -->
    </div>
</section>


@endsection

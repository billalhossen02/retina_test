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
                <div class="col-sm-6">
                    <h4 class="page-title text-left">Attendance Logs</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Attendance</a></li>
                    </ol>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-hover table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <br>
                                <thead class="thead-dark">
                                        <tr>
                                            <th data-priority="1">Date</th>
                                            <th data-priority="2">EmpID</th>
                                            <th data-priority="3">Name</th>
                                            <th data-priority="4">Attendance</th>
                                            <th data-priority="5">Time In</th>
                                            <th data-priority="6">Time Out</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($attendances as $attendance)

                                            <tr>
                                                <td>{{ $attendance->attendance_date }}</td>
                                                <td>{{ $attendance->emp_id }}</td>
                                                <td>{{ $attendance->employee->name }}</td>
                                                <td>{{ $attendance->attendance_time }}
                                                    @if ($attendance->status == 1)
                                                        <span class="badge bg-success badge-pill float-right">On Time</span>
                                                    @else
                                                        <span class="badge bg-danger badge-pill float-right">Late</span>
                                                    @endif
                                                </td>

                                                <td>{{ $attendance->employee->schedules->first()->time_in }} </td>
                                                <td>{{ $attendance->employee->schedules->first()->time_out }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
        </div>

</section>


@endsection


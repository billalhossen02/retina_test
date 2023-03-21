@extends('master')


@section('content')

   <!-- main dashboard -->
   <section class="dashboard">
    <!-- wrapper -->
    <div class="dashboard_wrapper">

        <!-- sidebar -->
        @include('employee.sidebar')
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
                <div style="display: flex; justify-content: flex-end;">
                    <button class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Give Attendance</button>
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
                                            <th data-priority="6">Time In</th>
                                            <th data-priority="7">Time Out</th>

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

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive table-hover table-bordered table-sm">
                                        <thead class="thead-dark">
                                                <tr>
                                                    @php
                                                        $today = today();
                                                        $date = date('y-m-d');
                                                        $date_picker = $date;
                                                    @endphp
                                                        <th>
                                                            {{ $date }}
                                                        </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <form action="{{ route('check_store') }}" method="post">

                                                    <button type="submit" class="btn btn-success" style="display: flex; margin:10px">Submit Attendance</button>
                                                    @csrf
                                                        <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                                                        <div class="md-form mb-3">
                                                            <i class="fas fa-envelope prefix grey-text"></i>
                                                            <label data-error="wrong" data-success="right" for="form29">Time In</label>
                                                            <input type="time" name="time_in" id="form29" class="form-control validate" required>
                                                        </div>

                                                        <div class="md-form mb-3">
                                                            <i class="fa fa-phone-square prefix grey-text"></i>
                                                            <label data-error="wrong" data-success="right" for="form32">Time Out</label>
                                                            <input type="time" name="time_out" id="form32" class="form-control validate" required>
                                                        </div>

                                                        @php

                                                        $check_attd = \App\Models\Attendance::query()
                                                            ->where('emp_id', $employee->id)
                                                            ->where('attendance_date', $date_picker)
                                                            ->first();

                                                        $check_leave = \App\Models\Leave::query()
                                                            ->where('emp_id', $employee->id)
                                                            ->where('leave_date', $date_picker)
                                                            ->first();

                                                        @endphp

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" id="check_box"
                                                                name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="hidden"
                                                                @if (isset($check_attd))  checked @endif id="inlineCheckbox1" value="1">

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" id="check_box"
                                                                name="leave[{{ $date_picker }}][{{ $employee->id }}]]" type="hidden"
                                                                @if (isset($check_leave))  checked @endif id="inlineCheckbox2" value="1">

                                                        </div>

                                                </form>
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

        </div>
        </div>
        </div>
        </div>
</section>


@endsection



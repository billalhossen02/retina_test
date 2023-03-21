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
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive table-hover table-bordered table-sm">
                            <thead class="thead-dark">
                                    <tr>

                                        <th>Employee</th>
                                        <th>Position</th>
                                        @php
                                            $today = today();
                                            $dates = [];

                                            for ($i = 1; $i < $today->daysInMonth + 1; ++$i) {
                                                $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');
                                            }

                                        @endphp
                                        @foreach ($dates as $date)
                                            <th>
                                                {{ $date }}
                                            </th>

                                        @endforeach

                                    </tr>
                                </thead>

                                <tbody>


                                    <form action="{{ route('check_store') }}" method="post">

                                        <button type="submit" class="btn btn-success" style="display: flex; margin:10px">Submit Attendance</button>
                                        @csrf
                                        @foreach ($employees as $employee)

                                            <input type="hidden" name="emp_id" value="{{ $employee->id }}">

                                            <tr>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->position }}</td>

                                                @for ($i = 1; $i < $today->daysInMonth + 1; ++$i)

                                                    @php

                                                        $date_picker = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d');

                                                        $check_attd = \App\Models\Attendance::query()
                                                            ->where('emp_id', $employee->id)
                                                            ->where('attendance_date', $date_picker)
                                                            ->first();

                                                        $check_leave = \App\Models\Leave::query()
                                                            ->where('emp_id', $employee->id)
                                                            ->where('leave_date', $date_picker)
                                                            ->first();

                                                    @endphp
                                                    <td>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" id="check_box"
                                                                name="attd[{{ $date_picker }}][{{ $employee->id }}]" type="checkbox"
                                                                @if (isset($check_attd))  checked @endif id="inlineCheckbox1" value="1">

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" id="check_box"
                                                                name="leave[{{ $date_picker }}][{{ $employee->id }}]]" type="checkbox"
                                                                @if (isset($check_leave))  checked @endif id="inlineCheckbox2" value="1">

                                                        </div>

                                                    </td>
                                                @endfor
                                            </tr>
                                        @endforeach
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

</section>


@endsection


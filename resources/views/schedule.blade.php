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
                    <h4 class="page-title text-left">Schedules</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Schedule</a></li>
                    </ol>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <button class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Schedule</button>
                </div>
                <!-- btn -->
                <div class="student_imformaion_table">
                    <div class="admin_table_content">
                        <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <!-- thead -->
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Shift </th>
                                        <th>Time in</th>
                                        <th>Time out</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <!-- tbody -->
                                <tbody>
                                    @foreach ($schedules as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->time_in }}</td>
                                        <td>{{ $item->time_out }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                            <a href="#" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                        </td>
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
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form name="myForm" action="{{ route('schedule.store') }}" class="studententry_form" method="POST" enctype="multipart/form-data">
                                       @csrf
                                        <div class="modal-body mx-4">
                                            <div class="login_logo">
                                                <img style="width:170px; float: right;" src="assets/image/logo.png" alt="" />
                                            </div>
                                            <br>
                                            <div class="md-form mb-3">
                                                <i class="fas fa-user prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form34">Name</label>
                                                <input type="text" name="name" id="form34" class="form-control validate" required>
                                            </div>

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

                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-lg btn-danger" type="submit" name="save_student">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

</section>
@endsection


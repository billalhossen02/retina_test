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
                    <h4 class="page-title text-left">Employees</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employees List</a></li>
                    </ol>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <button class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Employee</button>
                </div>
                <!-- btn -->
                <div class="student_imformaion_table">
                    <div class="admin_table_content">
                        <table id="datatable-buttons" class="table table-striped table-hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <!-- thead -->
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Schedule</th>
                                        <th>Member Since</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <!-- tbody -->
                                <tbody>
                                    @foreach ($employees as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>
                                            @if(isset($item->schedules->first()->slug))
                                            {{$item->schedules->first()->slug}}
                                            @endif
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                           <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                           data-bs-target="#myModal{{ $item->id }}"><i class='fa fa-eye'></i></button>
                                            <a href="#" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i></a>
                                            <a href="#" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i></a>
                                        </td>
                                    </tr>
                                    <div id="myModal{{ $item->id }}" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="text-align: center">
                                                    <div class="student_modal_main">
                                                        <div class="student_modal">
                                                            <h3 class=" student_details_table_title">Employee Details
                                                            </h3>
                                                            <img width="120px" src="{{ asset('storage/Employee/'.$item->details->photo) }}" alt="">
                                                            <br>
                                                            <p> <strong>Employee Name:</strong>
                                                                {{ $item->name }}
                                                            </p>
                                                            <p>
                                                                <strong>Email Address:</strong>
                                                                {{ $item->email }}
                                                            </p>
                                                            <p>
                                                                <strong>Phone Number:</strong>
                                                                {{ $item->details->phone }}

                                                            </p>
                                                            <p>
                                                                <strong>Address:</strong>
                                                                {{ $item->details->address }}
                                                            </p>
                                                            <p>
                                                        </div>
                                                        <br>
                                                        <div class="student_modal">
                                                            <p>
                                                            <h3 class=" student_details_table_title">Emergency Contact
                                                            </h3>
                                                            <br>
                                                            </p>
                                                            <p> <strong>Contact Name:</strong>
                                                                {{ $item->contact->contact_name }}
                                                            </p>
                                                            <p>
                                                                <strong>Contact Phone Number:</strong>
                                                                {{ $item->contact->contact_phone }}

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <form name="myForm" action="{{ route('employees.store') }}" class="studententry_form" method="POST" enctype="multipart/form-data">
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
                                                <i class="fas fa-mobile prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form34">Phone</label>
                                                <input type="text" name="phone" id="form34" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fas fa-envelope prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form29">Email</label>
                                                <input type="email" name="email" id="form29" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fa fa-phone-square prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form32">Position</label>
                                                <input type="text" name="position" id="form32" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fa fa-phone-square prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form32">Image</label>
                                                <input type="file" name="photo" id="form32" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fa fa-phone-square prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form32">Address</label>
                                                <input type="text" name="address" id="form32" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fa fa-phone-square prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form32">Emergency Contact Name</label>
                                                <input type="text" name="contact_name" id="form32" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fa fa-phone-square prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form32">Emergency Contact Phone</label>
                                                <input type="text" name="contact_phone" id="form32" class="form-control validate" required>
                                            </div>

                                            <div class="md-form mb-3">
                                                <i class="fa fa-clock prefix grey-text"></i>
                                                <label data-error="wrong" data-success="right" for="form32">Schedule</label>
                                                 <select class="form-control" id="schedule" name="schedule" required>
                                                    <option value="" selected>- Select -</option>
                                                    @foreach($schedules as $schedule)
                                                    <option value="{{$schedule->slug}}">{{$schedule->slug}} -> from {{$schedule->time_in}}
                                                        to {{$schedule->time_out}} </option>
                                                    @endforeach
                                                </select>
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


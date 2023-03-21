<div class="dashboard_sidebar" id="dashboard_sidebar">
    <!-- content -->
    <div class="sidebar_content">
        <!-- sidebar top -->
        <div class="sidebar_top">
            <!-- logo -->
            <a href="#" class="sidebar_logo">
                <img src="{{ asset('assets/image/logo.png') }}" alt="">
            </a>
        </div>

        <!-- sidebar nav -->
        <div class="sidebar_nav">
            <ul>
                <!-- item -->
                <li class="sidebar_nav_item active">
                    <a href="./dashboard" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/business-report.png') }}" alt="">
                        <span class="sidebar_nav_text">Dashborad</span>
                    </a>
                </li>

                <hr>

                <li class="sidebar_nav_item active">
                    <a href="{{ url('schedules') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/timetable.png') }}" alt="">
                        <span class="sidebar_nav_text">Schedules</span>
                    </a>
                </li>

                <li class="sidebar_nav_item active">
                    <a href="{{ route('employees.index') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/division.png') }}" alt="">
                        <span class="sidebar_nav_text">Employees List</span>
                    </a>
                </li>

                <li class="sidebar_nav_item active">
                    <a href="{{ url('attendance') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/attendance.png') }}" alt="">
                        <span class="sidebar_nav_text">Attendance Sheet</span>
                    </a>
                </li>

                <li class="sidebar_nav_item active">
                    <a href="{{ url('sheet-report') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/report.png') }}" alt="">
                        <span class="sidebar_nav_text">Sheet Report</span>
                    </a>
                </li>

                <li class="sidebar_nav_item active">
                    <a href="{{ url('attendance-log') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/immigration.png') }}" alt="">
                        <span class="sidebar_nav_text">Attendance Logs</span>
                    </a>
                </li>
                <hr>

                <!-- item -->
                <li class="sidebar_nav_item active">
                    <a href="{{ route('logout') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/logout.png') }}" alt="">
                        <span class="sidebar_nav_text">Logout</span>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>

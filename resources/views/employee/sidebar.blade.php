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
                    <a href="{{ url('employees_dashboard') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/business-report.png') }}" alt="">
                        <span class="sidebar_nav_text">Dashboard</span>
                    </a>
                </li>
                <hr>
                <li class="sidebar_nav_item active">
                    <a href="{{ url('employee-report') }}" class="sidebar_navItem_inner">
                        <img width="20px" src="{{ asset('assets/image/report.png') }}" alt="">
                        <span class="sidebar_nav_text">Reports</span>
                    </a>
                </li>

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

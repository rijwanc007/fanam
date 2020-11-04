<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/user/15640848.png')}}" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                    <span class="text-secondary text-small">{{'Admin'}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-tie menu-icon"></i>
            </a>
            <div class="collapse" id="user-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#grade" aria-expanded="false" aria-controls="grade">
                <span class="menu-title">Grade</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="grade">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('grade.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('grade.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="false" aria-controls="employee">
                <span class="menu-title">Employee</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="employee">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('employee.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#company" aria-expanded="false" aria-controls="company">
                <span class="menu-title">Company</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-power-socket-us menu-icon"></i>
            </a>
            <div class="collapse" id="company">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('company.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('company.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sc" aria-expanded="false" aria-controls="sc">
                <span class="menu-title">Sister Concern</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-usb menu-icon"></i>
            </a>
            <div class="collapse" id="sc">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('siscon.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('siscon.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collection" aria-expanded="false" aria-controls="collection">
                <span class="menu-title">Collection</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-currency-usd menu-icon"></i>
            </a>
            <div class="collapse" id="collection">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('collection.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('collection.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tatd" aria-expanded="false" aria-controls="tatd">
                <span class="menu-title">TA/TD</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-convert menu-icon"></i>
            </a>
            <div class="collapse" id="tatd">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('tatd.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#project" aria-expanded="false" aria-controls="project">
                <span class="menu-title">Projects</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-projector menu-icon"></i>
            </a>
            <div class="collapse" id="project">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('project.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('project.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#incentive" aria-expanded="false" aria-controls="incentive">
                <span class="menu-title">Incentive</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-inbox menu-icon"></i>
            </a>
            <div class="collapse" id="incentive">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('incentive.create')}}">Create</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('incentive.index')}}">Index</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

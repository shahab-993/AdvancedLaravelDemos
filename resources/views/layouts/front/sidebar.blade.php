<nav class="sidebar">

    <ul class="nav flex-column">


        @if (auth()->check() && auth()->user()->role_id == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminhome') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.roles.index') }}">Roles</a>
            </li>
        @elseif (auth()->check() && auth()->user()->role_id > 2)
            <li class="nav-item">

                <a class="nav-link" href="{{ route('employeesWithPermissions.index') }}">
                    Manage Employees
                </a>

            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
            </li>
        @endif


        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf

                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </form>
        </li>

    </ul>


</nav>

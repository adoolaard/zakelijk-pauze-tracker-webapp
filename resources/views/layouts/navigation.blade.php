<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">Medewerkers</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('shifts.index') }}">Shifts</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('breaks.index') }}">Pauzeplanner</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('break-rules.index') }}">Pauzeregeling</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('busy-periods.index') }}">Drukke momenten</a></li>
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link nav-link px-0" type="submit">Uitloggen</button>
        </form>
    </li>
</ul>

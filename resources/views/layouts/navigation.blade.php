<div class="h-full flex flex-col p-4 space-y-2 text-gray-100">
    <a href="{{ route('dashboard') }}" class="font-bold text-xl mb-4 text-white">Pauze Tracker</a>
    <a href="{{ route('dashboard') }}" class="px-2 py-2 rounded hover:bg-gray-700">Dashboard</a>
    <a href="{{ route('employees.index') }}" class="px-2 py-2 rounded hover:bg-gray-700">Medewerkers</a>
    <a href="{{ route('shifts.index') }}" class="px-2 py-2 rounded hover:bg-gray-700">Shifts</a>
    <a href="{{ route('breaks.index') }}" class="px-2 py-2 rounded hover:bg-gray-700">Pauzeplanner</a>
    <a href="{{ route('break-rules.index') }}" class="px-2 py-2 rounded hover:bg-gray-700">Pauzeregeling</a>
    <a href="{{ route('busy-periods.index') }}" class="px-2 py-2 rounded hover:bg-gray-700">Drukke momenten</a>
    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-2 py-2 rounded hover:bg-gray-700 w-full text-left">Uitloggen</button>
        </form>
    </div>
</div>

<x-app-layout>
    <x-slot name="header">
        {{ __('Medewerkers') }}
    </x-slot>

    <div class="py-6">
        <div class="mb-4">
            <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe medewerker</a>
        </div>

        <ul class="bg-white shadow divide-y">
            @foreach($employees as $employee)
                <li class="flex justify-between p-4">
                    <a href="{{ route('employees.show', $employee) }}" class="text-blue-600">{{ $employee->name }}</a>
                    <form method="POST" action="{{ route('employees.destroy', $employee) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Verwijder</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>


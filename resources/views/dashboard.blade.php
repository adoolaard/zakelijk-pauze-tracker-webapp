<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="mt-4 space-x-4">
                        <a href="{{ route('employees.index') }}" class="text-blue-600">Medewerkers</a>
                        <a href="{{ route('shifts.index') }}" class="text-blue-600">Shifts</a>
                        <a href="{{ route('breaks.index') }}" class="text-blue-600">Pauzeplanner</a>
                        <a href="{{ route('break-rules.index') }}" class="text-blue-600">Pauzeregeling</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

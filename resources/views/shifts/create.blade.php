<x-app-layout>
    <x-slot name="header">
        {{ __('Nieuwe shift') }}
    </x-slot>

    <form method="POST" action="{{ route('shifts.store') }}" class="p-6 max-w-md space-y-4">
        @csrf
        <div>
            <x-input-label for="employee_id" :value="__('Medewerker')" />
            <select name="employee_id" id="employee_id" class="mt-1 block w-full">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="start_time" :value="__('Starttijd')" />
            <x-text-input id="start_time" name="start_time" type="datetime-local" class="mt-1 block w-full" required />
        </div>
        <div>
            <x-input-label for="end_time" :value="__('Eindtijd')" />
            <x-text-input id="end_time" name="end_time" type="datetime-local" class="mt-1 block w-full" required />
        </div>

        <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
    </form>
</x-app-layout>


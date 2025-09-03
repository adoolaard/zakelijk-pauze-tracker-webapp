<x-app-layout>
    <x-slot name="header">
        {{ __('Shifts') }}
    </x-slot>

    <div class="py-6">
        <div class="mb-4">
            <a href="{{ route('shifts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe shift</a>
        </div>

        <table class="min-w-full bg-white">
            <thead>
                <tr class="border-b">
                    <th class="p-2 text-left">Medewerker</th>
                    <th class="p-2 text-left">Begin</th>
                    <th class="p-2 text-left">Einde</th>
                    <th class="p-2 text-left">Pauzes</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($shifts as $shift)
                    <tr class="border-b">
                        <td class="p-2">{{ $shift->employee->name }}</td>
                        <td class="p-2">{{ $shift->start_time }}</td>
                        <td class="p-2">{{ $shift->end_time }}</td>
                        <td class="p-2">
                            @foreach($shift->breakPeriods as $period)
                                <div>{{ $period->start_time }} - {{ $period->end_time }} ({{ $period->status }})</div>
                            @endforeach
                        </td>
                        <td class="p-2">
                            <form method="POST" action="{{ route('shifts.destroy', $shift) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


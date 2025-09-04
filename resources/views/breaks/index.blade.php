<x-app-layout>
    <x-slot name="header">
        {{ __('Pauzeplanner') }}
    </x-slot>

    <div class="py-6">
        @if($busy)
            <div class="mb-4 p-4 bg-red-100">Er is een druk moment bezig. Geen pauzes plannen.</div>
        @elseif($next)
            <div class="mb-4 p-4 bg-green-100">Volgende pauze: {{ $next->employee->name }}</div>
        @endif
        <form id="bulk-break-form" method="POST" action="{{ route('breaks.bulk-confirm') }}" class="mb-4">
            @csrf
            <input type="number" name="minutes" value="30" class="border p-1 w-20 mr-2" min="1">
            <button class="bg-green-500 text-white px-4 py-2 rounded">Start geselecteerde pauzes</button>
        </form>

        <table class="min-w-full bg-white">
            <thead>
                <tr class="border-b">
                    <th class="p-2"></th>
                    <th class="p-2 text-left">Medewerker</th>
                    <th class="p-2 text-left">Shift</th>
                    <th class="p-2 text-left">Pauzes</th>
                    <th class="p-2 text-left">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shifts as $shift)
                    <tr class="border-b align-top">
                        <td class="p-2"><input type="checkbox" name="shift_ids[]" value="{{ $shift->id }}" form="bulk-break-form"></td>
                        <td class="p-2"><a href="{{ route('employees.show', $shift->employee) }}" class="text-blue-600">{{ $shift->employee->name }}</a></td>
                        <td class="p-2">{{ $shift->start_time }} - {{ $shift->end_time }}</td>
                        <td class="p-2">
                            @foreach($shift->breakPeriods as $period)
                                <div>{{ $period->start_time }} - {{ $period->end_time }} ({{ $period->duration }} min, {{ $period->status }})</div>
                            @endforeach
                        </td>
                        <td class="p-2 space-y-2">
                            <div>Aanbevolen: {{ $shift->nextBreakSuggestion() }} min (resterend: {{ $shift->remainingBreakMinutes() }} min)</div>
                            <form method="POST" action="{{ route('breaks.reject', $shift) }}" class="inline">
                                @csrf
                                <button class="text-red-600">Weiger</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


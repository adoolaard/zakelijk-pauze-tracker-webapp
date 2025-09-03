<x-app-layout>
    <x-slot name="header">
        {{ $employee->name }}
    </x-slot>

    <div class="py-6">
        <h2 class="mb-4 font-semibold">Shifts</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr class="border-b">
                    <th class="p-2 text-left">Shift</th>
                    <th class="p-2 text-left">Pauzes</th>
                    <th class="p-2 text-left">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shifts as $shift)
                    <tr class="border-b align-top">
                        <td class="p-2">{{ $shift->start_time }} - {{ $shift->end_time }}</td>
                        <td class="p-2">
                            @foreach($shift->breakPeriods as $period)
                                <div>{{ $period->start_time }} - {{ $period->end_time }} ({{ $period->duration }} min, {{ $period->status }})</div>
                            @endforeach
                        </td>
                        <td class="p-2 space-x-2">
                            <form method="POST" action="{{ route('breaks.confirm', $shift) }}" class="inline">
                                @csrf
                                <button class="text-green-600">Start pauze</button>
                            </form>
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

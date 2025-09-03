<x-app-layout>
    <x-slot name="header">
        {{ __('Pauzeplanner') }}
    </x-slot>

    <div class="py-6">
        @if($next)
            <div class="mb-4 p-4 bg-green-100">Volgende pauze: {{ $next->employee->name }}</div>
        @endif

        <table class="min-w-full bg-white">
            <thead>
                <tr class="border-b">
                    <th class="p-2 text-left">Medewerker</th>
                    <th class="p-2 text-left">Shift</th>
                    <th class="p-2 text-left">Status</th>
                    <th class="p-2 text-left">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shifts as $shift)
                    <tr class="border-b">
                        <td class="p-2">{{ $shift->employee->name }}</td>
                        <td class="p-2">{{ $shift->start_time }} - {{ $shift->end_time }}</td>
                        <td class="p-2">{{ $shift->breakPeriod->status ?? 'pending' }}</td>
                        <td class="p-2 space-x-2">
                            @if(!$shift->breakPeriod || $shift->breakPeriod->status === 'pending')
                                <form method="POST" action="{{ route('breaks.confirm', $shift) }}" class="inline">
                                    @csrf
                                    <button class="text-green-600">Bevestig</button>
                                </form>
                                <form method="POST" action="{{ route('breaks.reject', $shift) }}" class="inline">
                                    @csrf
                                    <button class="text-red-600">Weiger</button>
                                </form>
                            @else
                                <span>{{ $shift->breakPeriod->start_time }} - {{ $shift->breakPeriod->end_time }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        {{ __('Pauzeregeling') }}
    </x-slot>

    <div class="py-6">
        <div class="mb-4">
            <a href="{{ route('break-rules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuwe regel</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr class="border-b">
                    <th class="p-2 text-left">Min uren</th>
                    <th class="p-2 text-left">Max uren</th>
                    <th class="p-2 text-left">Pauze (minuten)</th>
                    <th class="p-2 text-left">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rules as $rule)
                    <tr class="border-b">
                        <td class="p-2">{{ $rule->min_hours }}</td>
                        <td class="p-2">{{ $rule->max_hours ?? '∞' }}</td>
                        <td class="p-2">{{ $rule->break_minutes }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('break-rules.edit', $rule) }}" class="text-blue-600">Wijzig</a>
                            <form method="POST" action="{{ route('break-rules.destroy', $rule) }}" class="inline">
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


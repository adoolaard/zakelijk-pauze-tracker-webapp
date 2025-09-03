<x-app-layout>
    <x-slot name="header">
        {{ __('Drukke momenten') }}
    </x-slot>

    <div class="py-6">
        <form method="POST" action="{{ route('busy-periods.store') }}" class="mb-6 bg-white p-4">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Starttijd</label>
                <input type="datetime-local" name="start_time" class="border p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Eindtijd</label>
                <input type="datetime-local" name="end_time" class="border p-2 w-full" required>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Toevoegen</button>
        </form>

        <ul class="bg-white shadow divide-y">
            @foreach($periods as $period)
                <li class="flex justify-between p-4">
                    <span>{{ $period->start_time }} - {{ $period->end_time }}</span>
                    <form method="POST" action="{{ route('busy-periods.destroy', $period) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Verwijder</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>

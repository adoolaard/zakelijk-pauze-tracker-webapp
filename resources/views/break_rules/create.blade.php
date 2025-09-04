<x-app-layout>
    <x-slot name="header">
        {{ __('Nieuwe pauzeregel') }}
    </x-slot>

    <form method="POST" action="{{ route('break-rules.store') }}" class="p-6 max-w-md space-y-4">
        @csrf
        <div>
            <x-input-label for="min_hours" :value="__('Min uren')" />
            <x-text-input id="min_hours" name="min_hours" type="number" step="0.1" class="mt-1 block w-full" required />
        </div>
        <div>
            <x-input-label for="max_hours" :value="__('Max uren')" />
            <x-text-input id="max_hours" name="max_hours" type="number" step="0.1" class="mt-1 block w-full" />
        </div>
        <div>
            <x-input-label for="break_minutes" :value="__('Pauze (minuten)')" />
            <x-text-input id="break_minutes" name="break_minutes" type="number" class="mt-1 block w-full" required />
        </div>

        <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
    </form>
</x-app-layout>

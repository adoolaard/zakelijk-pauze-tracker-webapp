<x-app-layout>
    <x-slot name="header">
        {{ __('Wijzig pauzeregel') }}
    </x-slot>

    <form method="POST" action="{{ route('break-rules.update', $break_rule) }}" class="p-6 max-w-md space-y-4">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="min_hours" :value="__('Min uren')" />
            <x-text-input id="min_hours" name="min_hours" type="number" step="0.1" value="{{ $break_rule->min_hours }}" class="mt-1 block w-full" required />
        </div>
        <div>
            <x-input-label for="max_hours" :value="__('Max uren')" />
            <x-text-input id="max_hours" name="max_hours" type="number" step="0.1" value="{{ $break_rule->max_hours }}" class="mt-1 block w-full" />
        </div>
        <div>
            <x-input-label for="break_minutes" :value="__('Pauze (minuten)')" />
            <x-text-input id="break_minutes" name="break_minutes" type="number" value="{{ $break_rule->break_minutes }}" class="mt-1 block w-full" required />
        </div>

        <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
    </form>
</x-app-layout>


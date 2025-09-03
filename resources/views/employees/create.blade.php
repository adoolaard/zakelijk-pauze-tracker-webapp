<x-app-layout>
    <x-slot name="header">
        {{ __('Nieuwe medewerker') }}
    </x-slot>

    <form method="POST" action="{{ route('employees.store') }}" class="p-6 max-w-md space-y-4">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
    </form>
</x-app-layout>


<x-layout>
    <x-slot:heading>Show Note</x-slot>

    <div class="mt-6 pb-10">
        {{ $note->body }}
    </div>

    <div>
        <x-button href="/notes">Go Back to Notes</x-button>
    </div>
</x-layout>

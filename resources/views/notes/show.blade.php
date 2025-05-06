<x-layout>
    <x-slot:heading>Show Note</x-slot>
    <h1 class="font-bold">Body:</h1>

    <div class="ml-4 mt-6 pb-10">
        {{ $note->body }}
    </div>

    <div class="mt-10">
        <x-back-link
            href="/notes"
            class="rounded-md border border-blue-500 p-1"
        >
            Go Back to Notes
        </x-back-link>
    </div>
    <form
        method="POST"
        action="/notes/{{ $note->id }}"
        class="hidden"
        id="delete-form"
    >
        @csrf
        @method("DELETE")
    </form>
    <button form="delete-form" class="text-sm font-bold text-red-500">
        Delete
    </button>
</x-layout>

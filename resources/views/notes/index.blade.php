<x-layout>
    <x-slot:heading>Notes</x-slot>

    <div class="space-y">
        <div class="mt-6 flex justify-end">
            <button
                type="button"
                class="rounded-md border border-indigo-500 p-2"
            >
                <a href="/notes/create">Create Note</a>
            </button>
        </div>
        @foreach ($notes as $note)
            <a
                href="/notes/{{ $note->id }}"
                class="text-blue-500 hover:underline"
            >
                <div>
                    {{ $note->body }}
                </div>
            </a>
        @endforeach

        <div>
            {{ $notes->links() }}
        </div>
    </div>
</x-layout>

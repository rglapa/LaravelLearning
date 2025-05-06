<x-layout>
    <x-slot:heading>Notes</x-slot>

    <div class="space-y">
        <div class="mt-6 flex justify-end">
            <x-link
                href="/notes/create"
                class="rounded-md border border-indigo-500 p-2"
            >
                Create Note
            </x-link>
        </div>
        @foreach ($notes as $note)
            @if (\Auth::user())
                <a
                    href="/notes/{{ $note->id }}"
                    class="text-blue-500 hover:underline"
                >
                    <div>
                        {{ $note->body }}
                    </div>
                </a>
            @endif
        @endforeach

        @if (Auth::user())
            <div>
                {{ $notes->links() }}
            </div>
        @endif
    </div>
</x-layout>

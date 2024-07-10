<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Partages") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($user->recettes[0]->links as $link)
                <a href="{{ route('template', $link->token) }}">{{ $link->template }}</a>
            @endforeach
        </div>
    </div>
</x-app-layout>
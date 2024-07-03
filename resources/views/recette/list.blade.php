<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Recettes') }}
        </h2>
    </x-slot>
    
    @foreach ($recettes as $recette)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <section class="space-y-6">
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    <a href="{{ route('recettes', $recette->id) }}">{{ $recette->nom }}</a>
                                </h2>
                        
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{  $recette->description }}
                                </p>
                            </header>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
</x-app-layout>
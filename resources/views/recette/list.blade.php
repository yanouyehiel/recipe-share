<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Recettes') }}
        </h2>
    </x-slot>
    
    <div class="container mx-2 p-4">
        <div class="grid gap-3 gap-y-8 md:grid-cols-2 lg:grid-cols-3 mb-16">
            @foreach ($recettes as $recette)
                <div class="bg-white rounded-md overflow-hidden relative shadow-md">
                    <div><img class="w-full h-60" src="{{ asset("/storage/".$recette->image) }}" alt="Recipe Title"></div>
                    <div class="p-4">
                        <h2 class="text-2xl text-green-400">{{ $recette->nom }}</h2>
                        <div class="flex justify-between mt-4 mb-4 text-gray-500">
                            <div class="flex items-center">
                                <img class="h-6 w-6" src="{{ asset("/images/cooking-time.png") }}" alt="cookingTime_icon">
                                <span class="ml-1 lg:text-xl">{{ $recette->cookingTime }}m</span>
                            </div>
                            <div class="flex items-center">
                                <img class="h-6 w-6" src="{{ asset("/images/bake.png") }}" alt="preparationTime_icon">
                            <span class="ml-1 lg:text-xl">{{ $recette->preparationTime}}m</span>
                            </div>
                            <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                            <span class="ml-1 lg:text-xl">{{ $recette->nbPersonnes }}</span>
                            </div>
                        </div>
                        <p class="mb-4 text-gray-500">{{ $recette->description }}</p>
                        <div class="flex">
                            <a href="recette/{{ $recette->id }}/modify" class="text-white text-center bg-green-400 p-4 rounded-md w-full uppercase">Modifier la recette</a>
                        </div>
                    </div>
                    <div class="absolute top-2 right-0 mt-4 mr-4 bg-green-400 text-white rounded-full pt-1 pb-1 pl-4 pr-5 text-xs uppercase">
                        <span>{{ $recette->difficulte }}</span>
                    </div>
                </div>
            
            @endforeach
        </div>
    </div>
    
</x-app-layout>
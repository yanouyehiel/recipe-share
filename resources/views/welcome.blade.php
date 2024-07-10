<x-app-layout>
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    
                </header>

                <div class="container mx-2 p-4">
                    <div class="grid gap-1 gap-y-8 md:grid-cols-2 lg:grid-cols-1 mb-16">
                        @foreach ($recettes as $recette)
                            <div class="bg-white rounded-md overflow-hidden relative shadow-md flex">
                                <div><img class="w-full" src="{{ asset($recette->image) }}" alt="Recipe Title"></div>
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
                                        <a href="recette/{{ $recette->id }}" class="text-white text-center bg-green-400 p-4 rounded-md w-full uppercase">Voir la recette</a>
                                    </div>
                                </div>
                                <div class="absolute top-0 right-0 mt-4 mr-4 bg-green-400 text-white rounded-full pt-1 pb-1 pl-4 pr-5 text-xs uppercase">
                                    <span>{{ $recette->difficulte }}</span>
                                </div>
                            </div>
                        
                        @endforeach
                    </div>
                </div>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    {{-- Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) --}}
                    RecipShare v1.0.0
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>
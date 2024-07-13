<x-app-layout>
  <div class="bg-white md:w-1/2 md:m-auto md:pt-5 md:rounded-lg md:mt-6">
    <div class="md:mx-5">
      <img class="md:rounded-md md:m-auto h-80 w-full" src="{{ asset("/storage/".$recette?->image) }}" alt="Recipe">
    </div>  
    
    <h1 class="font-young-serif text-3xl pt-8 px-5 pb-5 text-dark_charcoal">{{ $recette?->nom }}</h1>

    <p class="font-outfit text-sm px-5 pb-6 md:text-base text-dark_charcoal">{{ $recette?->description }}</p>

    <div class="bg-rose_white mx-5 px-5 py-2.5 mb-6 rounded-lg">
      <p class="text-dark_raspberry font-bold text-base md:text-lg">Temps de préparation</p>

      <ul class="mt-3 mx-1 space-y-2 text-dark_charcoal">
        <li class="text-sm md:text-base flex items-center gap-3">
          <p class="inline text-xl text-wenge_brown">•</p>
          <div>
            <span class="font-bold text-wenge_brown inline">Total:</span>
            <p class="inline">{{ $recette?->preparationTime + $recette?->cookingTime }} minutes</p>
          </div>
        </li>

        <li class="text-sm md:text-base flex items-center gap-3">
          <p class="inline text-xl text-wenge_brown">•</p>
          <div>
            <span class="font-bold text-wenge_brown inline">Préparation:</span>
            <p class="inline">{{ $recette?->preparationTime }} minutes</p>
          </div>
        </li>

        <li class="text-sm md:text-base flex items-center gap-3">
          <p class="inline text-xl text-wenge_brown">•</p>
          <div>
            <span class="font-bold text-wenge_brown inline">Cuisson:</span>
            <p class="inline">{{ $recette?->cookingTime }} minutes</p>
          </div>
        </li>
      </ul>
    </div>
  

    <h2 class="text-nutmeg font-young-serif text-2xl mx-5 mb-3">Ingrédients</h2>

    <ul class="mx-5 space-y-2 text-dark_charcoal">
        @foreach ($recette?->ingredients as $ingredient)
          <div class="flex items-center">
            <li class="text-sm md:text-base flex items-center gap-3 ml-1">
              <p class="inline text-xl">•</p>
              <p class="inline">{{ $ingredient->nom }}</p>
            </li>
            <p class="inline">Nombre de calories : {{ $ingredient->calorie }}kcal</p>
          </div>
        @endforeach
    </ul>
  
    <hr class="mx-5 my-8">

    <h2 class="text-nutmeg font-young-serif text-2xl mx-5 mb-3">Instructions</h2>

    <ul class="mx-5 space-y-2 text-dark_charcoal">
      @foreach ($recette->etapes()->get() as $key => $etape)
        <li class="text-sm md:text-base list-none flex gap-3">
          <p class="inline font-bold text-nutmeg ml-1">{{ $key + 1 }}.</p>
          <div>
            <p class="inline">{{ $etape->description }}</p>
          </div>
        </li>
      @endforeach
    </ul>

    <hr class="mx-5 my-8">

    <h2 class="text-nutmeg font-young-serif text-2xl mx-5 mb-3">Nutrition</h2>

    <ul class="mx-5 mb-5 space-y-2 text-dark_charcoal">
      <li class="text-sm md:text-base leading-5 pb-3 border-b grid grid-cols-2">
        <p class="mx-6">Calories</p>
        <span class="font-bold text-nutmeg">{{ $recette->nbCalories }}kcal</span>
      </li>
      <li class="text-sm md:text-base leading-5 pb-3 border-b grid grid-cols-2">
        <p class="mx-6">Glucides</p>
        <span class="font-bold text-nutmeg">0g</span>
      </li>
      <li class="text-sm md:text-base leading-5 pb-3 border-b grid grid-cols-2">
        <p class="mx-6">Protéines</p>
        <span class="font-bold text-nutmeg">20g</span>
      </li>
      <li class="text-sm md:text-base leading-5 pb-8 grid grid-cols-2">
        <p class="mx-6">Graisse</p>
        <span class="font-bold text-nutmeg">22g</span></li>
    </ul>
  </div>

  <div class="bg-white md:w-1/2 md:m-auto md:pt-5 md:rounded-lg py-12">
    <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __("Les commentaires") }}
    </h2>
    
    @if (count($recette->commentaires()->get()) > 0)
      @foreach ($recette->commentaires()->get() as $commentaire)
        <div class="flex justify-between mt-4 px-12">
          <span>{{ $commentaire->user()->get()[0]->name }}</span>
          <p class="font-semibold text-base text-gray-800 dark:text-gray-200">{{ $commentaire->comment }}</p>
          <span>{{ $commentaire->created_at->format('d M y h:i:s')}}</span>
        </div>
      @endforeach
    @else
      <p class="text-center text-base text-gray-800 dark:text-gray-200 mt-4">Aucun commentaire enregistré</p>
    @endif
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <livewire:recette.add-comment :recette="$recette" />
    </div>
  </div>
</x-app-layout>
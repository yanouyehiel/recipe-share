<x-app-layout>
    <div>
        <article
        class="bg-[#fff] md:my-[5rem] md:py-8 pb-8 md:rounded-xl md:max-w-screen-md"
        >
        <div class="flex justify-center">
            <img
                src="{{ asset($recette->image) }}"
                alt="Photo of an omelette with vegetables on a plate"
                class="md:max-w-[90%] md:mx-auto md:rounded-xl"
                width="500px"
                height="500px"
            />
        </div>
        <div class="px-8 font-outfit text-wenge-brown">
            <h1 class="font-fancy text-4xl mt-8 text-dark-charcoal">{{ $recette->nom }}</h1>
            <p class="mt-6">{{ $recette->description }}</p>
            <article class="bg-rose-white mt-6 p-5 rounded-xl">
            <h2 class="text-dark-raspberry text-xl font-semibold ml-2">
                Preparation time
            </h2>
            <ul class="list-disc mt-3 ml-8 text-lg marker:text-dark-raspberry">
                <li class="pl-3">
                <p>
                    <span class="font-semibold">Total: </span>Approximately 10
                    minutes
                </p>
                </li>
                <li class="mt-3 pl-3">
                <p><span class="font-semibold">Preparation: </span>5 minutes</p>
                </li>
                <li class="mt-3 pl-3">
                <p><span class="font-semibold">Cooking: </span>5 minutes</p>
                </li>
            </ul>
            </article>
            <div class="mt-8">
            <h3 class="font-fancy text-3xl text-nutmeg">Ingredients</h3>
            <ul
                class="list-disc marker:text-nutmeg mt-4 ml-6 text-wenge-brown marker:align-middle"
            >
                <li class="pl-4">2-3 large eggs</li>
                <li class="pl-4 mt-2">Salt, to taste</li>
                <li class="pl-4 mt-2">Pepper, to taste</li>
                <li class="pl-4 mt-2">1 tablespoon of butter or oil</li>
                <li class="pl-4 mt-2">
                Optional fillings: cheese, diced vegetables, cooked meats, herbs
                </li>
            </ul>
            </div>
            <div class="w-full h-px bg-light-gray mx-auto mt-8"></div>
            <div class="mt-8">
            <h3 class="font-fancy text-3xl text-nutmeg">Instructions</h3>
            <ol
                class="marker:text-nutmeg marker:font-semibold marker:font-outfit list-decimal mt-4 ml-6"
            >
                <li class="pl-4">
                <p>
                    <span class="font-bold">Beat the eggs: </span>In a bowl, beat
                    the eggs with a pinch of salt and pepper until they are well
                    mixed. You can add a tablespoon of water or milk for a
                    fluffier texture.
                </p>
                </li>
                <li class="pl-4 mt-2">
                <p>
                    <span class="font-bold">Heat the pan: </span>Place a non-stick
                    frying pan over medium heat and add butter or oil.
                </p>
                </li>
                <li class="pl-4 mt-2">
                <p>
                    <span class="font-bold">Cook the omelette: </span>Once the
                    butter is melted and bubbling, pour in the eggs. Tilt the pan
                    to ensure the eggs evenly coat the surface.
                </p>
                </li>
                <li class="pl-4 mt-2">
                <p>
                    <span class="font-bold">Add fillings (optional): </span>When
                    the eggs begin to set at the edges but are still slightly
                    runny in the middle, sprinkle your chosen fillings over one
                    half of the omelette.
                </p>
                </li>
                <li class="pl-4 mt-2">
                <p>
                    <span class="font-bold">Fold and serve: </span>As the omelette
                    continues to cook, carefully lift one edge and fold it over
                    the fillings. Let it cook for another minute, then slide it
                    onto a plate.
                </p>
                </li>
                <li class="pl-4 mt-2">
                <p>
                    <span class="font-bold">Enjoy: </span>Serve hot, with
                    additional salt and pepper if needed.
                </p>
                </li>
            </ol>
            </div>
            <div class="w-full h-px bg-light-gray mx-auto mt-8"></div>
            <div class="mt-8">
            <h3 class="font-fancy text-3xl text-nutmeg">Nutrition</h3>
            <p class="mt-4">
                The table below shows nutritional values per serving without the
                additional fillings.
            </p>
            <ul class="mt-6">
                <li>
                <div class="flex">
                    <p class="ml-8 text-lg w-full mr-auto">Calories</p>
                    <p class="font-bold text-nutmeg text-lg w-full mr-auto">
                    277kcal
                    </p>
                </div>
                <div class="w-full h-px bg-light-gray mx-auto mt-3"></div>
                </li>
                <li>
                <div class="flex mt-3">
                    <p class="ml-8 text-lg w-full mr-auto">Carbs</p>
                    <p class="font-bold text-nutmeg text-lg w-full mr-auto">0g</p>
                </div>
                <div class="w-full h-px bg-light-gray mx-auto mt-3"></div>
                </li>
                <li>
                <div class="flex mt-3">
                    <p class="ml-8 text-lg w-full mr-auto">Protein</p>
                    <p class="font-bold text-nutmeg text-lg w-full mr-auto">
                    20g
                    </p>
                </div>
                <div class="w-full h-px bg-light-gray mx-auto mt-3"></div>
                </li>
                <li>
                <div class="flex mt-3">
                    <p class="ml-8 text-lg w-full mr-auto">Fat</p>
                    <p class="font-bold text-nutmeg text-lg w-full mr-auto">
                    22g
                    </p>
                </div>
                </li>
            </ul>
            </div>
        </div>
        </article>
    </div>
</x-app-layout>
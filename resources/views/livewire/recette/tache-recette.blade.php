<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                        {{ $this->form }}
                
                        <div class="mt-6 flex">
                            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div>
            <form wire:submit.prevent="submit" enctype="multipart/form-data">
                {{ $this->form }}
        
                <div class="mt-6 flex">
                    <x-primary-button>{{ __('Commenter') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

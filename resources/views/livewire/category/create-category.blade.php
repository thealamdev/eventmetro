<form wire:submit="store" class="ml-6">
    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
        <div class="flex justify-between mb-[24px]">
            <h3 class="text-title">Create Category</h3>
            <a href="{{ route('admin.category.index') }}" class="flex items-center px-0 bg-transparent gap-1 text-paragraph hover:text-primary-400 transition-colors">
                Category Lists
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 12H4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15 17C15 17 20 13.3176 20 12C20 10.6824 15 7 15 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">
        <div class="border border-base-500 p-6 rounded">
            <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                <div class="w-full">
                    <x-forms.label for="title" required='yes'>
                        {{ __('Category title') }}
                    </x-forms.label>
                    <x-forms.text-input type="text" wire:model.live='title' placeholder="Category title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            </div>

            <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                <div class="pt-2 w-full">
                    <x-forms.label for="status" required='yes'>
                        {{ __('Status') }}
                    </x-forms.label>
                    <x-forms.select-input wire:model.live="status">
                        <option selected>--Select Status--</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </x-forms.select-input>

                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>

            <div class="pt-6">
                <x-buttons.primary>
                    Create
                </x-buttons.primary>
            </div>
        </div>
    </div>
</form>
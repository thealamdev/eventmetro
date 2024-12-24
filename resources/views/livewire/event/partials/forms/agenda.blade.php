<form wire:submit="store">
    <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-1 lg:gap-6 md:gap-6 sm:gap-4">
        <div class="col-span-2">
            <x-forms.label for="form.date" required="yes">
                {{__('Topic')}}
            </x-forms.label>
            <x-forms.text-input wire.model="form.topic" />
            <x-input-error :messages="$errors->get('form.topic')" class="mt-2" />
        </div>

        <div>
            <x-forms.label style="opacity: 0;" for="form.start_date" required="yes">
                {{__('Date and time')}}
            </x-forms.label>
            <x-forms.text-input-icon placeholder="Start time" wire.model="form.start_date" type="text" dir="end">
                <x-svg.clock />
            </x-forms.text-input-icon>
            <x-input-error :messages="$errors->get('form.start_date')" class="mt-2" />
        </div>
        <div>
            <x-forms.label style="opacity: 0;" for="form.end_date" required="yes">
                {{__('Date and time')}}
            </x-forms.label>
            <x-forms.text-input-icon placeholder="End time" wire.model="form.end_date" type="text" dir="end">
                <x-svg.clock />
            </x-forms.text-input-icon>
            <x-input-error :messages="$errors->get('form.end_date')" class="mt-2" />
        </div>
    </div>
    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 mt-2">
        <x-forms.label for="form.agenda_description">
            {{ __('Description') }}
        </x-forms.label>
        <div wire:ignore>
            <textarea wire:ignore cols="30" id="editor2" rows="10" wire:model.lazy='form.agenda_description'
                class="w-full py-3 text-base font-normal font-inter border border-slate-400 rounded"
                placeholder="Add description here.."></textarea>
            <x-input-error :messages="$errors->get('form.agenda_description')" class="mt-2" />
        </div>
    </div>

    <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-1 gap-6 mt-2 justify-between items-center">
        <div class="col-span-4">
            <x-forms.label for="form.speaker" required="yes">
                {{ __('Speaker') }}
            </x-forms.label>
            <x-forms.text-input wire:model="form.speaker" />
            <x-input-error :messages="$errors->get('form.speaker')" class="mt-2" />
        </div>

        <div class="flex justify-end items-center mt-3">
            <div class="flex justify-end items-center">
                <div class="w-full flex justify-center">
                    <div class="flex p-2 justify-center items-center text-center w-[80px] h-[80px] rounded-full bg-primary-700">
                        <p class="text-paragraph">Add Photo</p>
                    </div>
                </div>
                <input wire:model="form.image" type="file" id="file-input" multiple accept="image/*" hidden />
            </div>
            <div id="preview" class="preview-area"></div>
            <x-input-error :messages="$errors->get('form.image')" class="mt-2" />
        </div>
    </div>

    <div class="mt-6">
        <x-buttons.primary>
            Add New
        </x-buttons.primary>
    </div>
</form>
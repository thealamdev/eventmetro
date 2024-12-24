<div class="grid lg:grid-cols-7 ml-6 lg:gap-6">
    <div class="col-span-1 mt-24">
        <div class="p-3 border border-primary-400 bg-primary-700 text-paragraph rounded mb-3">What is this event about?</div>
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">When And Where This Event Is Happening?</div>
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">Add More to Your Event</div>
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">When And Where This Event Is Happening?</div>
    </div>

    <div class="col-span-6">
        <form wire:submit="store">
            @include('livewire.event.partials.step')
            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-8 gap-4">
                <div class="border border-base-500 p-6 rounded">
                    <div class="mb-5">
                        <div class="flex justify-between items-center">
                            <h3 class="text-title pb-1">What is this event about?</h3>
                            <x-svg.down-arrow />
                        </div>
                        <p class="text-paragraph">A concise and engaging description of your event. Use a clear and descriptive title that conveys the essence of your event.</p>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                        <div class="w-full">
                            <x-forms.label for="form.title" required='yes'>
                                {{ __('Event title') }}
                            </x-forms.label>
                            <x-forms.text-input type="text" wire:model="form.title" placeholder="Event title" />
                            <x-input-error :messages="$errors->get('form.title')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="w-full">
                            <x-forms.label for="form.description" required='yes'>
                                {{ __('Event description') }}
                            </x-forms.label>
                            <x-forms.text-input type="text" wire:model='form.description' placeholder="Event description" />
                            <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="w-full">
                            <x-forms.label for="form.description" required='yes'>
                                {{ __('About this event') }}
                            </x-forms.label>
                            <div wire:ignore>
                                <textarea wire:ignore cols="30" id="editor" rows="10" wire:model="form.details" class="w-full py-3 text-base font-normal font-inter border border-slate-400 rounded" placeholder="Add description here.."></textarea>
                            </div>
                            <x-input-error :messages="$errors->get('form.details')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                        <div class="pt-2 w-full">
                            <x-forms.label for="form.image">
                                {{ __('Image') }}
                            </x-forms.label>
                            <div class="upload-container">
                                <input wire:model="form.image" type="file" id="file-input" accept="image/*" hidden />
                            </div>
                            <div id="drop-area" class="drag-area">
                                <div class="w-full flex justify-center pb-1">
                                    <div class="flex justify-center items-center w-[64px] h-[64px] rounded-full bg-primary-700">
                                        <x-svg.upload />
                                    </div>
                                </div>
                                <h3 class="text-title pb-1">Drug & Drop</h3>
                                <p class="text-paragraph pb-1">or <span>Browse</span> your photos to upload</p>
                                <p class="text-paragraph">Supported image format .JPEG, .PNG</p>
                            </div>
                            <span class="text-paragraph">*Upload up to 10 photos (Recommended size: 1920x1080px,Max file size: 10MB each).</span>

                            <div class="preview-area">
                                @if ($form->image)
                                <img src="{{ $form->image->temporaryUrl() }}">
                                @endif
                            </div>

                            <x-input-error :messages="$errors->get('form.image')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                        <div class="pt-2 w-full">
                            <x-forms.label for="form.organizer" required='yes'>
                                {{ __('Organizer') }}
                            </x-forms.label>
                            <x-forms.select-input wire:model="form.organizer">
                                <option>--Select Organizer--</option>
                                @foreach ($organizers as $each)
                                <option value="{{ $each->id }}">{{ $each->name }}</option>
                                @endforeach
                            </x-forms.select-input>

                            <x-input-error :messages="$errors->get('form.organizer')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                        <div class="pt-2 w-full">
                            <x-forms.label for="form.category">
                                {{ __('Category') }}
                            </x-forms.label>
                            <x-forms.select-input wire:model="form.category">
                                <option>--Select category--</option>
                                @foreach ($categories as $each)
                                <option value="{{ $each->id }}">{{ $each->title }}</option>
                                @endforeach
                            </x-forms.select-input>

                            <x-input-error :messages="$errors->get('form.category')" class="mt-2" />
                        </div>
                    </div>

                    <div class="pt-6">
                        <x-buttons.primary>
                            Save & Next
                        </x-buttons.primary>
                    </div>
                </div>
                <div>data</div>
            </div>
        </form>

    </div>
</div>

@push('script')
<script>
    const editor = ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('form.details', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
<div class="grid lg:grid-cols-7 ml-6 lg:gap-6">
    <div class="col-span-1 mt-24">
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">What is this event about?</div>
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">When And Where This Event Is Happening?</div>
        <div class="p-3 border border-primary-400 bg-primary-700 text-paragraph rounded mb-3">Add Agenda to Your Event</div>
        <a href="{{ route('admin.event.faq.create', ['event' => $event->id]) }}">
            <div class="p-3 border border-line-base text-paragraph rounded mb-3">When And Where This Event Is Happening?</div>
        </a>
    </div>

    <div class="col-span-6">
        <form wire:submit.prevent="store">
            @include('livewire.event.partials.step')

            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-8 gap-4">
                <div class="border border-base-500 p-6 rounded">
                    <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="lg:col-span-2">
                            <x-forms.label for="form.topic" required="yes">
                                {{__('Topic')}}
                            </x-forms.label>
                            <x-forms.text-input wire:model="form.topic" />
                            <x-input-error :messages="$errors->get('form.topic')" class="mt-2" />
                        </div>
                        <div class="lg:col-span-1">
                            <x-forms.label style="opacity: 0;" for="form.startTime" required="yes">
                                {{ __('Start time') }}
                            </x-forms.label>
                            <x-forms.text-input-icon id="startTime" placeholder="Start time" wire:model="form.startTime" type="text" dir="end">
                                <x-svg.clock />
                            </x-forms.text-input-icon>
                            <x-input-error :messages="$errors->get('form.startTime')" class="mt-2" />
                        </div>
                        <div class="lg:col-span-1">
                            <x-forms.label style="opacity: 0;" for="form.endTime" required="yes">
                                {{ __('End time') }}
                            </x-forms.label>
                            <x-forms.text-input-icon id="endTime" placeholder="End time" wire:model="form.endTime" type="text" dir="end">
                                <x-svg.clock />
                            </x-forms.text-input-icon>
                            <x-input-error :messages="$errors->get('form.endTime')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="w-full">
                            <x-forms.label for="form.description">
                                {{ __('About this event') }}
                            </x-forms.label>
                            <div wire:ignore>
                                <textarea wire:ignore cols="30" id="editor" rows="10" wire:model='form.description' class="w-full py-3 text-base font-normal font-inter border border-slate-400 rounded" placeholder="Add description here.."></textarea>
                            </div>
                            <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-1 gap-6 mt-2 justify-between items-center">
                        <div class="col-span-4">
                            <x-forms.label for="form.speaker">
                                {{ __('Speaker') }}
                            </x-forms.label>
                            <x-forms.text-input wire:model="form.speaker" />
                            <x-input-error :messages="$errors->get('form.speaker')" class="mt-2" />
                        </div>

                        <div class="flex justify-end items-center mt-3">
                            <div class="flex justify-end items-center">
                                <div class="w-full flex justify-center">
                                    <div class="relative overflow-hidden flex p-2 justify-center items-center text-center w-[80px] h-[80px] rounded-full bg-primary-700 cursor-pointer" onclick="document.getElementById('image').click()">
                                        <span class="text-paragraph">Add Photo</span>
                                        <div class="absolute top-0 left-0 z-10">
                                            @if ($form->image)
                                            <img src="{{ $form->image->temporaryUrl() }}" alt="">
                                            @endif
                                        </div>
                                        <input class="absolute opacity-0" wire:model="form.image" type="file" accept="image/*" />
                                    </div>
                                </div>

                            </div>
                            <x-input-error :messages="$errors->get('form.image')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="w-full">
                            <x-forms.label for="form.designation">
                                {{ __('Speaker designation') }}
                            </x-forms.label>
                            <x-forms.text-input wire:model="form.designation" />
                            <x-input-error :messages="$errors->get('form.designation')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Save and Next Button -->
                    <div class="pt-6">
                        <x-buttons.primary>
                            Save
                        </x-buttons.primary>
                        <x-buttons.primary type="button" wire:click="next">
                            Save & Next
                        </x-buttons.primary>
                    </div>
                </div>
                <!-- Event Details Section -->
                <div>
                    <p>Event Name : {{ $event?->title }}</p>
                    <p>Event Details : {!! $event?->details !!}</p>
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Slot</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Location</th>
                        </thead>
                        @foreach ($event->schedules as $each)
                        <tr>
                            <td>{{ $each->id }}</td>
                            <td>{{ $each->slot }}</td>
                            <td>{{ $each->date }}</td>
                            <td>{{ $each->start }}</td>
                            <td>{{ $each->end }}</td>
                            <td>{{ $each->location }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Slot</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Location</th>
                        </thead>
                        @foreach ($event->agendas as $each)
                        <tr>
                            <td>{{ $each->id }}</td>
                            <td>{{ $each->topic }}</td>
                            <td>{{ $each->description }}</td>
                            <td>{{ $each->start }}</td>
                            <td>{{ $each->end }}</td>

                            <td><img src="{{ $each?->image?->url }}" alt="#" width="50px" height="50px" style="border-radius: 50%;"></td>
                        </tr>
                        @endforeach
                    </table>


                </div>
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
                @this.set('form.description', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    flatpickr("#startTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minTime: "00:00",
        maxTime: "23:00",
    });
    flatpickr("#endTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minTime: "00:00",
        maxTime: "23:00",
    });
</script>
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-full" />`;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endpush
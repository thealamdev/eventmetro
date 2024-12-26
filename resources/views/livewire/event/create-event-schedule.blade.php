<div class="grid lg:grid-cols-7 ml-6 lg:gap-6">
    <div class="col-span-1 mt-24">
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">What is this event about?</div>
        <div class="p-3 border border-primary-400 bg-primary-700 text-paragraph rounded mb-3">When And Where This Event Is Happening?</div>
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">Add More to Your Event</div>
        <div class="p-3 border border-line-base text-paragraph rounded mb-3">When And Where This Event Is Happening?</div>
    </div>

    <div class="col-span-6">
        <form wire:submit.prevent="store">
            @include('livewire.event.partials.step')

            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-8 gap-4">
                <div class="border border-base-500 p-6 rounded">
                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2">
                        <x-forms.label for="form.session" required="yes">
                            {{ __('Session') }}
                        </x-forms.label>
                        <x-forms.text-input id="session" placeholder="Enter Session name" wire:model="form.session" type="text" dir="end" />
                        <x-input-error :messages="$errors->get('form.session')" class="mt-1" />
                    </div>
                    <!-- Date and Time Section -->
                    <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="lg:col-span-2">
                            <x-forms.label for="form.date" required="yes">
                                {{ __('Date and time') }}
                            </x-forms.label>
                            <x-forms.text-input-icon class="!pl-3" id="date" placeholder="Enter Date" wire:model="form.date" type="text" dir="end">
                                <x-svg.calender />
                            </x-forms.text-input-icon>
                            <x-input-error :messages="$errors->get('form.date')" class="mt-1" />
                        </div>
                        <div class="lg:col-span-1">
                            <x-forms.label style="opacity: 0;" for="form.startTime" required="yes">
                                {{ __('Start time') }}
                            </x-forms.label>
                            <x-forms.text-input-icon class="!pl-3" id="startTime" placeholder="Start time" wire:model="form.startTime" type="text" dir="end">
                                <x-svg.clock />
                            </x-forms.text-input-icon>
                            <x-input-error :messages="$errors->get('form.startTime')" class="mt-1" />
                        </div>
                        <div class="lg:col-span-1">
                            <x-forms.label style="opacity: 0;" for="form.endTime" required="yes">
                                {{ __('End time') }}
                            </x-forms.label>
                            <x-forms.text-input-icon class="!pl-3" id="endTime" placeholder="End time" wire:model="form.endTime" type="text" dir="end">
                                <x-svg.clock />
                            </x-forms.text-input-icon>
                            <x-input-error :messages="$errors->get('form.endTime')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Location Section -->
                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <x-forms.label for="form.location" required="yes">
                            {{ __('Location') }}
                        </x-forms.label>
                        <x-forms.text-input-icon class="!pl-3" id="location" wire:model="form.location" type="text" dir="end">
                            <x-svg.map />
                        </x-forms.text-input-icon>
                        <x-input-error :messages="$errors->get('form.location')" class="mt-1" />
                    </div>
                    <div class="grid lg:grid-cols-5 md:grid-cols-5 sm:grid-cols-1 lg:gap-6 md:gap-6 sm:gap-4 mt-2">
                        <div class="col-span-2">
                            <x-forms.text-input-icon class="!pl-3" id="street" placeholder="Street" wire:model="form.street" type="text" dir="end" />
                            <x-input-error :messages="$errors->get('form.street')" class="mt-1" />
                        </div>
                        <div>
                            <x-forms.text-input-icon class="!pl-3" id="city" placeholder="City" wire:model="form.city" type="text" dir="end" />
                            <x-input-error :messages="$errors->get('form.city')" class="mt-1" />
                        </div>
                        <div>
                            <x-forms.text-input-icon class="!pl-3" id="state" placeholder="State" wire:model="form.state" type="text" dir="end" />
                            <x-input-error :messages="$errors->get('form.state')" class="mt-1" />
                        </div>
                        <div>
                            <x-forms.text-input-icon class="!pl-3" id="zip" placeholder="Zip" wire:model="form.zip" type="text" dir="end" />
                            <x-input-error :messages="$errors->get('form.zip')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Show Map Section -->
                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 lg:gap-2 md:gap-2 sm:gap-4 mt-2">
                        <x-buttons.primary style="width:150px" class="!bg-primary-700 !text-primary-400 !text-paragraph">
                            Show Map
                        </x-buttons.primary>
                        <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29189.78740387627!2d90.00358355!3d23.86395295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755f603f1698647%3A0x894c2f1900643eb6!2sManikganj!5e0!3m2!1sen!2sbd!4v1732450190010!5m2!1sen!2sbd" height="311" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                        <div class="w-full">
                            <x-forms.label for="form.agenda">
                                {{ __('Agenda') }}
                            </x-forms.label>
                            <div wire:ignore>
                                <textarea wire:ignore cols="30" id="editor2" rows="10" wire:model='form.agenda' class="w-full py-3 text-base font-normal font-inter border border-slate-400 rounded" placeholder="Add agenda here.."></textarea>
                            </div>
                            <x-input-error :messages="$errors->get('form.agenda')" class="mt-1" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-buttons.primary type="button" wire:click="formIncrement" class="mt-6">
                            Add Speaker
                        </x-buttons.primary>
                        <p class="text-title">
                            {{ count($form->len) }}
                        </p>
                    </div>

                    @foreach ($form->len as $key => $each)
                        <div class="bg-primary-700 px-4 pb-4 mt-4">
                            <div class="grid lg:grid-cols-5 md:grid-cols-4 sm:grid-cols-1 gap-6 mt-2 justify-between items-center">
                                <div class="col-span-4">
                                    <x-forms.label for="form.len.{{ $key }}.speaker">
                                        Speaker
                                    </x-forms.label>
                                    <x-forms.text-input wire:model="form.len.{{ $key }}.speaker" />
                                    <x-input-error :messages="$errors->get('form.len.' . $key . '.speaker')" class="mt-1" />
                                </div>

                                <div class="flex justify-end items-center mt-3">
                                    <div class="flex justify-end items-center">
                                        <div class="w-full flex justify-center">
                                            <div class="relative overflow-hidden flex p-2 justify-center items-center text-center w-[80px] h-[80px] rounded-full bg-primary-700 cursor-pointer" onclick="event.stopPropagation(); document.getElementById('image_{{ $key }}')">
                                                <span class="text-paragraph">Add Photo</span>
                                                <div class="absolute top-0 left-0 z-10">
                                                    @if ($form->len[$key]['image'])
                                                        <img src="{{ $form->len[$key]['image']->temporaryUrl() }}" class="w-full h-full" alt="">
                                                    @endif
                                                </div>
                                                <input id="image_{{ $key }}" class="absolute opacity-0" wire:model="form.len.{{ $key }}.image" type="file" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('form.len.' . $key . '.image')" class="mt-1" />
                                </div>
                            </div>

                            <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                                <div class="w-full">
                                    <x-forms.label for="form.len.{{ $key }}.designation">
                                        Speaker designation
                                    </x-forms.label>
                                    <x-forms.text-input wire:model="form.len.{{ $key }}.designation" />
                                    <x-input-error :messages="$errors->get('form.len.' . $key . '.designation')" class="mt-1" />
                                </div>
                            </div>
                            <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 sm:gap-1 md:gap-2 mt-2">
                                <div class="w-full">
                                    <x-forms.label for="form.len.{{ $key }}.bio">
                                        Speaker bio
                                    </x-forms.label>
                                    <x-forms.text-input wire:model="form.len.{{ $key }}.bio" />
                                    <x-input-error :messages="$errors->get('form.len.' . $key . '.bio')" class="mt-1" />
                                </div>
                            </div>
                        </div>
                        <x-buttons.primary type="button" wire:click="formDecrement('{{ $key }}')">
                            X
                        </x-buttons.primary>
                    @endforeach

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
                        @foreach ($schedules as $each)
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
                </div>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        flatpickr("#date", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
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
        const editor = ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('form.agenda', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

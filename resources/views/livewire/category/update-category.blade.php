            <div class="border border-slate-300 p-5 rounded">
                <div class="flex justify-end pb-3 fixed top-24 right-10">
                    <a type="submit" class="px-8 py-2 bg-primary-400 text-white rounded" href="#">
                     Category List
                    </a>
                </div>
                <header class="flex justify-between mb-5">
                    <h4>Category Create</h4>
                </header>
                <form action="#">
                    <div class="flex justify-between">
                        <div class="p-2 w-full">
                            <x-forms.text-input type="text" placeholder="Enter Event Name" />
                        </div>

                        <div class="p-2 w-full">
                            <x-forms.text-input type="date" />
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="p-2 w-full">
                            <x-forms.text-input type="time" />
                        </div>

                        <div class="p-2 w-full">
                            <x-forms.text-input type="text" placeholder="Enter event address" />
                        </div>
                    </div>

                    <div class="p-2">
                        <x-buttons.primary>
                            Save Category
                        </x-buttons.primary>
                    </div>

                </form>
            </div>

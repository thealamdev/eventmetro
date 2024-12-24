<div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
    <div class="border border-line-base rounded p-8">
        <div class="mb-5">
            <div class="flex justify-between items-center">
                <h3 class="text-title pb-1">When And Where This Event Is Happening?</h3>
                <x-svg.down-arrow />
            </div>
            <div class="font-sans">
                <ul class="flex">
                    <li id="homeTab" class="tab text-primary-400 text-paragraph text-center bg-gray-50 py-3 px-6 border-b-2 border-primary-400 cursor-pointer transition-all">
                        Single Event
                    </li>
                    <li id="contentTab"
                        class="tab text-gray-600 text-paragraph text-center bg-gray-50 py-3 px-6 border-b-2 cursor-pointer transition-all">
                        Recurring event
                    </li>
                </ul>
            </div>
        </div>
        <div id="homeContent" class="tab-content max-w-2xl block mt-8">
            @include('livewire.event.partials.forms.location')
        </div>
        <div id="contentContent" class="tab-content max-w-2xl hidden mt-8">
            @include('livewire.event.partials.forms.basic')
        </div>
    </div>
</div>
<div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 mt-8">
    <div class="border border-line-base rounded p-8">
        <div class="mb-5">
            <div class="flex justify-between items-center">
                <h3 class="text-title pb-1">Add More to Your Event</h3>
                <x-svg.down-arrow />
            </div>
            <p class="text-paragraph">Agenda</p>
        </div>
        @include('livewire.event.partials.forms.agenda')
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tabs = document.querySelectorAll('.tab');
        let contents = document.querySelectorAll('.tab-content');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                let targetId = tab.id.replace('Tab', 'Content');

                contents.forEach(function(content) {
                    content.classList.add('hidden');
                });

                tabs.forEach(function(tab) {
                    tab.classList.remove('text-primary-400', 'text-paragraph', 'bg-gray-50', 'border-primary-400');
                    tab.classList.add('text-gray-600', 'text-paragraph');
                });

                document.getElementById(targetId).classList.remove('hidden');
                tab.classList.add('text-primary-400', 'text-paragraph', 'bg-gray-50', 'border-primary-400');
                tab.classList.remove('text-gray-600', 'text-paragraph');
            });
        });
    });
</script>
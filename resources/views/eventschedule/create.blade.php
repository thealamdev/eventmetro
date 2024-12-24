<x-app-layout>
    @include('eventschedule.breadcrumb.create')
    <livewire:event.create-event-schedule :event="$event" />
</x-app-layout>
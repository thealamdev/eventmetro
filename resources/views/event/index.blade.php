<x-app-layout>
    @include('event.breadcrumb.index')
    <table class="w-full">
        <thead>
            <th>ID</th>
            <th>Event Name</th>
            <th>Add Schedule</th>
        </thead>

        <tbody>
            @foreach ($events as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->title }}</td>
                <td>
                    <a href="{{ route('admin.event.schedule.create',['event' => $each->id]) }}">Add Schedule</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
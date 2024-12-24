<div>
    @php
        $response = [
            [
                'title' => 'Home',
                'route' => route('dashboard'),
            ],
            [
                'title' => '/',
                'route' => '#',
            ],
            [
                'title' => 'Event',
                'route' => route('admin.event.index'),
            ],
            [
                'title' => '/',
                'route' => '#',
            ],
            [
                'title' => 'Create Event',
                'route' => route('admin.event.create'),
            ]
        ];
    @endphp
    <x-breadcrumb :data="$response" />
</div>
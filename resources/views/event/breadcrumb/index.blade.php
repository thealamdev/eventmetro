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
                'title' => 'Events',
                'route' => route('admin.event.index'),
            ]
        ];
    @endphp
    <x-breadcrumb :data="$response" />
</div>
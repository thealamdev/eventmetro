<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventFAQ;
use App\Models\User;
use App\Models\Event;
use App\Models\EventEventFAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;

class EventFAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',  EventFAQ::class);
        return view("EventFAQ.index");
    }

    /**
     * Display a listing of the data table resource.
     */
    public function displayListDatatable()
    {
        Gate::authorize('viewAny',  EventFAQ::class);

        $EventFAQ = Cache::remember('EventFAQ_list', 60 * 60, function () {
            return EventFAQ::get();
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(?string $id)
    {
        $event = Event::query()->where(column: 'id', operator: $id)
            ->with(relations: ['schedules', 'faqs'])
            ->with(['agendas' => fn($query) => $query->with('image')])
            ->first();
        Gate::authorize('create', arguments: EventFAQ::class);
        return view('event-faq.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('create', EventFAQ::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventFAQ $EventFAQ)
    {
        //
        Gate::authorize('view',  $EventFAQ);
        return view('event-faq.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventFAQ $EventFAQ)
    {
        Gate::authorize('update', $EventFAQ);
        return view('event-faq.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventFAQ $EventFAQ)
    {
        Gate::authorize('update',  $EventFAQ);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventFAQ $EventFAQ)
    {
        Gate::authorize('delete',  $EventFAQ);
    }
}

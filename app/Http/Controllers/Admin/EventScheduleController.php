<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class EventScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        Gate::authorize('viewAny',  EventSchedule::class);
        return view("eventSchedule.index");
    }

    /**
     * Display a listing of the data table resource.
     */
    public function displayListDatatable()
    {
        Gate::authorize('viewAny',  EventSchedule::class);

        $eventSchedule = Cache::remember('eventSchedule_list', 60 * 60, function () {
            return EventSchedule::get();
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        Gate::authorize('create', EventSchedule::class);
        return view('eventSchedule.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('create', EventSchedule::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventSchedule $eventSchedule)
    {
        //
        Gate::authorize('view',  $eventSchedule);
        return view('eventSchedule.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventSchedule $eventSchedule)
    {
        Gate::authorize('update', $eventSchedule);
        return view('eventSchedule.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventSchedule $eventSchedule)
    {
        Gate::authorize('update',  $eventSchedule);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventSchedule $eventSchedule)
    {
        Gate::authorize('delete',  $eventSchedule);
    }
}
